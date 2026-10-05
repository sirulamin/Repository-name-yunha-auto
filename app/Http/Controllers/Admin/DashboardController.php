<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use App\Models\TestDrive;
use App\Models\User;
use App\Models\Reservation;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCars = Car::count();
        $availableCars = Car::where('status', 'Available')->count();
        $soldCars = Car::where('status', 'Sold')->count();

        $totalBrands = Brand::count();
        $totalTestDrives = TestDrive::count();
        $totalUsers = User::count();
        $totalReservations = Reservation::count();
        $pendingPayments = Payment::where('status', 'Pending')->count();

        return view('admin.dashboard', compact(
            'totalCars',
            'availableCars',
            'soldCars',
            'totalBrands',
            'totalTestDrives',
            'totalUsers',
            'totalReservations',
            'pendingPayments'
        ));
    }
}