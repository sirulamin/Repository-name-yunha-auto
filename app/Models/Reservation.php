<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'car_id',
        'reservation_code',
        'phone',
        'preferred_date',
        'dp_percent',
        'dp_amount',
        'notes',
        'status',
    ];

    protected $casts = [
        'preferred_date' => 'date',
        'dp_percent' => 'float',
        'dp_amount' => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
