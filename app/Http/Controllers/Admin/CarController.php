<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::with('brand')
            ->latest()
            ->get();

        return view('admin.cars.index', compact('cars'));
    }

    public function create()
    {
        $brands = Brand::orderBy('name')->get();

        return view('admin.cars.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'brand_id' => ['nullable', 'required_unless:brand_id,new', 'exists:brands,id'],
            'new_brand' => ['nullable', 'required_if:brand_id,new', 'string', 'max:100', 'unique:brands,name'],
            'name' => ['required', 'string', 'max:150'],
            'year' => ['required', 'integer', 'min:1900', 'max:' . (now()->year + 1)],
            'price' => ['required', 'numeric', 'min:0'],
            'mileage' => ['required', 'integer', 'min:0'],
            'transmission' => ['required', 'in:Manual,Automatic'],
            'fuel' => ['required', 'in:Bensin,Diesel,Hybrid,Electric'],
            'color' => ['required', 'string', 'max:50'],
            'condition' => ['required', 'in:Baru,Bekas'],
            'description' => ['nullable', 'string', 'max:5000'],
            'images' => ['nullable', 'array', 'max:10'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        DB::transaction(function () use ($request, $validated) {
            $brandId = $validated['brand_id'];

            if ($brandId === 'new') {
                $brandId = Brand::create([
                    'name' => $validated['new_brand'],
                ])->id;
            }

            $car = Car::create([
                'brand_id' => $brandId,
                'name' => $validated['name'],
                'year' => $validated['year'],
                'price' => $validated['price'],
                'mileage' => $validated['mileage'],
                'transmission' => $validated['transmission'],
                'fuel' => $validated['fuel'],
                'color' => $validated['color'],
                'condition' => $validated['condition'],
                'description' => $validated['description'] ?? null,
                'status' => 'Available',
            ]);

            foreach ($request->file('images', []) as $index => $image) {
                $path = $image->store('cars', 'public');

                $car->images()->create([
                    'image' => $path,
                    'is_primary' => $index === 0,
                ]);
            }
        });

        return redirect()
            ->route('admin.cars.index')
            ->with('success', 'Mobil berhasil ditambahkan.');
    }

    public function edit(Car $car)
    {
        $brands = Brand::orderBy('name')->get();
        $car->load('brand', 'images');

        return view('admin.cars.edit', compact('car', 'brands'));
    }

    public function update(Request $request, Car $car)
    {
        $validated = $request->validate([
            'brand_id' => ['required', 'exists:brands,id'],
            'name' => ['required', 'string', 'max:150'],
            'year' => ['required', 'integer', 'min:1900', 'max:' . (now()->year + 1)],
            'price' => ['required', 'numeric', 'min:0'],
            'mileage' => ['required', 'integer', 'min:0'],
            'transmission' => ['required', 'in:Manual,Automatic'],
            'fuel' => ['required', 'in:Bensin,Diesel,Hybrid,Electric'],
            'color' => ['required', 'string', 'max:50'],
            'condition' => ['required', 'in:Baru,Bekas'],
            'status' => ['required', 'in:Available,Booked,Sold'],
            'description' => ['nullable', 'string', 'max:5000'],
            'images' => ['nullable', 'array', 'max:10'],
            'images.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
        ]);

        if (in_array($validated['status'], ['Available', 'Sold'], true)
            && $car->reservations()->where('status', 'Confirmed')->exists()) {
            return back()
                ->withErrors(['status' => 'Status mobil tidak dapat diubah karena masih memiliki reservasi yang dikonfirmasi.'])
                ->withInput();
        }

        DB::transaction(function () use ($request, $car, $validated) {
            $car->update([
                'brand_id' => $validated['brand_id'],
                'name' => $validated['name'],
                'year' => $validated['year'],
                'price' => $validated['price'],
                'mileage' => $validated['mileage'],
                'transmission' => $validated['transmission'],
                'fuel' => $validated['fuel'],
                'color' => $validated['color'],
                'condition' => $validated['condition'],
                'status' => $validated['status'],
                'description' => $validated['description'] ?? null,
            ]);

            foreach ($request->file('images', []) as $image) {
                $path = $image->store('cars', 'public');

                $car->images()->create([
                    'image' => $path,
                    'is_primary' => !$car->images()->where('is_primary', true)->exists(),
                ]);
            }
        });

        return redirect()
            ->route('admin.cars.index')
            ->with('success', 'Data mobil berhasil diperbarui.');
    }

    public function destroy(Car $car)
    {
        $car->load('images');

        DB::transaction(function () use ($car) {
            foreach ($car->images as $image) {
                Storage::disk('public')->delete($image->image);
            }

            $car->delete();
        });

        return redirect()
            ->route('admin.cars.index')
            ->with('success', 'Mobil berhasil dihapus.');
    }
}
