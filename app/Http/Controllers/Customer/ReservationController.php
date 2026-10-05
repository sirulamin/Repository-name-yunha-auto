<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ReservationController extends Controller
{
    public function create(Car $car)
    {
        abort_unless($car->status === 'Available', 404);

        return view('customer.reservations.create', compact('car'));
    }

    public function store(Request $request, Car $car)
    {
        $data = $request->validate([
            'phone' => ['required', 'string', 'max:20', 'regex:/^[0-9+()\-\s]+$/'],
            'preferred_date' => ['nullable', 'date', 'after_or_equal:today'],
            'dp_percent' => ['required', 'numeric', 'min:10', 'max:80'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $reservation = DB::transaction(function () use ($request, $car, $data) {
            $lockedCar = Car::query()->lockForUpdate()->findOrFail($car->id);

            abort_unless($lockedCar->status === 'Available', 409, 'Mobil ini sudah tidak tersedia.');

            $hasActiveReservation = Reservation::query()
                ->where('car_id', $lockedCar->id)
                ->whereIn('status', ['Pending', 'Confirmed'])
                ->exists();

            abort_if($hasActiveReservation, 409, 'Mobil ini sedang dalam proses reservasi.');

            $dpAmount = round((float) $lockedCar->price * ((float) $data['dp_percent'] / 100), 2);

            return Reservation::create([
                'user_id' => $request->user()->id,
                'car_id' => $lockedCar->id,
                'reservation_code' => 'YUNHA-' . strtoupper(Str::random(8)),
                'phone' => $data['phone'],
                'preferred_date' => $data['preferred_date'] ?? null,
                'dp_percent' => $data['dp_percent'],
                'dp_amount' => $dpAmount,
                'notes' => $data['notes'] ?? null,
                'status' => 'Pending',
            ]);
        });

        return redirect()
            ->route('reservation.show', $reservation)
            ->with('success', 'Reservasi berhasil dibuat. Menunggu konfirmasi admin.');
    }

    public function show(Reservation $reservation)
    {
        abort_unless($reservation->user_id === auth()->id(), 403);

        $reservation->load('car.brand', 'payment');

        return view('customer.reservations.show', compact('reservation'));
    }

    public function index()
    {
        $reservations = Reservation::with(['car.brand', 'payment'])
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('customer.reservations.index', compact('reservations'));
    }
}
