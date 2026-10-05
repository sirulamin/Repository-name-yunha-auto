<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\TestDrive;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class TestDriveController extends Controller
{
    public function create(Car $car)
    {
        abort_unless($car->status === 'Available', 404);

        return view('customer.test-drive.create', compact('car'));
    }

    public function store(Request $request, Car $car)
    {
        abort_unless($car->status === 'Available', 404);

        $validated = $request->validate([
            'date' => ['required', 'date', 'after_or_equal:today'],
            'time' => ['required', 'date_format:H:i'],
            'phone' => ['required', 'string', 'max:20', 'regex:/^[0-9+()\-\s]+$/'],
            'notes' => ['nullable', 'string', 'max:500'],
        ]);

        $requestedDateTime = Carbon::createFromFormat(
            'Y-m-d H:i',
            $validated['date'] . ' ' . $validated['time']
        );

        abort_if($requestedDateTime->isPast(), 422, 'Waktu test drive harus berada di masa mendatang.');

        DB::transaction(function () use ($request, $car, $validated) {
            $lockedCar = Car::query()->lockForUpdate()->findOrFail($car->id);
            abort_unless($lockedCar->status === 'Available', 409, 'Mobil ini sudah tidak tersedia.');

            $slotTaken = TestDrive::query()
                ->where('car_id', $lockedCar->id)
                ->whereDate('date', $validated['date'])
                ->whereTime('time', $validated['time'])
                ->whereIn('status', ['pending', 'approved'])
                ->exists();

            abort_if($slotTaken, 409, 'Jadwal test drive tersebut sudah dipakai. Silakan pilih waktu lain.');

            TestDrive::create([
                'user_id' => $request->user()->id,
                'car_id' => $lockedCar->id,
                'date' => $validated['date'],
                'time' => $validated['time'],
                'phone' => $validated['phone'],
                'notes' => $validated['notes'] ?? null,
                'status' => 'pending',
            ]);
        });

        return redirect()
            ->route('test-drive.index')
            ->with('success', 'Pengajuan test drive berhasil dikirim.');
    }

    public function index(Request $request)
    {
        $testDrives = TestDrive::with('car.brand')
            ->where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return view('customer.test-drive.index', compact('testDrives'));
    }
}
