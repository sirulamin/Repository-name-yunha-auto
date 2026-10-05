<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function index(Request $request)
    {
        $ids = collect($request->input('cars', []))
            ->map(fn ($id) => (int) $id)
            ->filter()
            ->unique()
            ->take(3)
            ->values();

        $cars = Car::with('brand')
            ->whereIn('id', $ids)
            ->get()
            ->sortBy(fn ($car) => $ids->search($car->id))
            ->values();

        return view('customer.compare.index', compact('cars'));
    }
}