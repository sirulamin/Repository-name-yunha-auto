<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['reservation.user', 'reservation.car.brand'])
            ->latest()
            ->get();

        return view('admin.payments.index', compact('payments'));
    }

    public function update(Request $request, Payment $payment)
    {
        $data = $request->validate([
            'status' => ['required', 'in:Pending,Paid,Cancelled'],
        ]);

        DB::transaction(function () use ($payment, $data) {
            $payment->refresh();

            abort_if($payment->status === 'Paid' && $data['status'] !== 'Paid', 422, 'Pembayaran yang sudah terverifikasi tidak dapat diubah dari halaman ini.');

            $payment->update([
                'status' => $data['status'],
                'paid_at' => $data['status'] === 'Paid' ? ($payment->paid_at ?? now()) : null,
            ]);
        });

        return back()->with('success', 'Status pembayaran berhasil diperbarui.');
    }
}
