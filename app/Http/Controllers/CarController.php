<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(Request $request)
    {
        $filters = $request->validate([
            'search' => ['nullable', 'string', 'max:100'],
            'brand' => ['nullable', 'integer', 'exists:brands,id'],
            'price' => ['nullable', 'in:under100,100to250,250to500,over500'],
        ]);

        $search = $filters['search'] ?? null;
        $brand = $filters['brand'] ?? null;
        $price = $filters['price'] ?? null;

        $cars = Car::with(['brand', 'images'])
            ->where('status', 'Available')
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhereHas('brand', fn ($brandQuery) => $brandQuery->where('name', 'like', "%{$search}%"));
                });
            })
            ->when($brand, fn ($query) => $query->where('brand_id', $brand))
            ->when($price, function ($query) use ($price) {
                match ($price) {
                    'under100' => $query->where('price', '<', 100_000_000),
                    '100to250' => $query->whereBetween('price', [100_000_000, 250_000_000]),
                    '250to500' => $query->whereBetween('price', [250_000_000, 500_000_000]),
                    'over500' => $query->where('price', '>', 500_000_000),
                    default => null,
                };
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $brands = Brand::orderBy('name')->get();

        return view('customer.cars.index', compact(
            'cars',
            'brands',
            'search',
            'brand',
            'price'
        ));
    }

    public function show(Car $car)
    {
        $car->load(['brand', 'images']);

        return view('customer.cars.show', compact('car'));
    }
}
