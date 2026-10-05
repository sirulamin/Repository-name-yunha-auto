<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            'Toyota',
            'Honda',
            'Mitsubishi',
            'Suzuki',
            'Daihatsu',
            'Nissan',
            'Mazda',
            'BMW',
            'Mercedes-Benz',
            'Hyundai',
        ];

        foreach ($brands as $brand) {
            Brand::create([
                'name' => $brand,
            ]);
        }
    }
}