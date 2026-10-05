<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Wishlist;
use App\Models\TestDrive;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        $carsCount = Car::where('status', 'Available')->count();

        $wishlistCount = Wishlist::where('user_id', auth()->id())->count();

        $testDriveCount = TestDrive::where('user_id', auth()->id())->count();

        return view('customer.dashboard', compact(
            'carsCount',
            'wishlistCount',
            'testDriveCount'
        ));
    }
}