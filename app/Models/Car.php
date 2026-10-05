<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'name',
        'year',
        'price',
        'mileage',
        'transmission',
        'fuel',
        'color',
        'condition',
        'description',
        'status',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function images()
    {
        return $this->hasMany(CarImage::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function testDrives()
    {
        return $this->hasMany(TestDrive::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}