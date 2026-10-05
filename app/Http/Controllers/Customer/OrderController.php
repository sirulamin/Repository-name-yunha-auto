<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Reservation;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Reservation::with(['car.brand', 'payment'])
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('customer.orders.index', compact('orders'));
    }

    public function show(Reservation $reservation)
    {
        abort_unless($reservation->user_id === auth()->id(), 403);

        $reservation->load('car.brand', 'payment');

        return view('customer.orders.show', compact('reservation'));
    }
}
