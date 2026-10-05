<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['user', 'car.brand', 'payment'])
            ->latest()
            ->get();

        return view('admin.reservations.index', compact('reservations'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        $data = $request->validate([
            'status' => ['required', 'in:Pending,Confirmed,Cancelled,Completed'],
        ]);

        DB::transaction(function () use ($reservation, $data) {
            $lockedReservation = Reservation::query()
                ->lockForUpdate()
                ->findOrFail($reservation->id);

            $car = Car::query()
                ->lockForUpdate()
                ->findOrFail($lockedReservation->car_id);

            $newStatus = $data['status'];
            $currentStatus = $lockedReservation->status;

            $validTransition = match ($newStatus) {
                'Confirmed' => in_array($currentStatus, ['Pending', 'Cancelled'], true),
                'Completed' => $currentStatus === 'Confirmed',
                'Cancelled' => in_array($currentStatus, ['Pending', 'Confirmed'], true),
                'Pending' => in_array($currentStatus, ['Pending', 'Cancelled'], true),
                default => false,
            };

            abort_unless($validTransition || $currentStatus === $newStatus, 422, 'Perubahan status reservasi tidak valid.');

            if ($newStatus === 'Confirmed') {
                abort_unless($car->status === 'Available', 409, 'Mobil tidak dapat dikonfirmasi karena status unit bukan Available.');

                $otherConfirmed = Reservation::query()
                    ->where('car_id', $car->id)
                    ->where('id', '!=', $lockedReservation->id)
                    ->where('status', 'Confirmed')
                    ->exists();

                abort_if($otherConfirmed, 409, 'Sudah ada reservasi lain yang dikonfirmasi untuk mobil ini.');

                $car->update(['status' => 'Booked']);
            }

            if (in_array($newStatus, ['Pending', 'Cancelled'], true)) {
                $otherConfirmed = Reservation::query()
                    ->where('car_id', $car->id)
                    ->where('id', '!=', $lockedReservation->id)
                    ->where('status', 'Confirmed')
                    ->exists();

                if (!$otherConfirmed && $car->status !== 'Sold') {
                    $car->update(['status' => 'Available']);
                }
            }

            $lockedReservation->update(['status' => $newStatus]);
        });

        return back()->with('success', 'Status reservasi berhasil diperbarui.');
    }
}
