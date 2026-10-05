<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    public function create(Reservation $reservation)
    {
        abort_unless($reservation->user_id === auth()->id(), 403);
        abort_unless($reservation->status === 'Confirmed', 403);
        abort_if($reservation->payment && $reservation->payment->status === 'Paid', 409, 'Pembayaran reservasi ini sudah terverifikasi.');

        $reservation->load('car.brand', 'payment');

        return view('customer.payments.create', compact('reservation'));
    }

    public function store(Request $request, Reservation $reservation)
    {
        abort_unless($reservation->user_id === auth()->id(), 403);
        abort_unless($reservation->status === 'Confirmed', 403);

        $data = $request->validate([
            'method' => ['required', 'in:Bank Transfer,E-Wallet,Virtual Account'],
        ]);

        $payment = DB::transaction(function () use ($reservation, $data) {
            $existing = Payment::query()
                ->where('reservation_id', $reservation->id)
                ->lockForUpdate()
                ->first();

            if ($existing && $existing->status === 'Paid') {
                abort(409, 'Pembayaran sudah diverifikasi.');
            }

            return Payment::updateOrCreate(
                ['reservation_id' => $reservation->id],
                [
                    'payment_code' => $existing?->payment_code ?? 'PAY-' . strtoupper(Str::random(8)),
                    'amount' => $reservation->dp_amount,
                    'method' => $data['method'],
                    'status' => 'Pending',
                    'paid_at' => null,
                ]
            );
        });

        return redirect()
            ->route('payment.show', $payment)
            ->with('success', 'Instruksi pembayaran berhasil dibuat. Pembayaran menunggu verifikasi admin.');
    }

    public function show(Payment $payment)
    {
        abort_unless($payment->reservation->user_id === auth()->id(), 403);

        $payment->load('reservation.car.brand');

        return view('customer.payments.show', compact('payment'));
    }
}
