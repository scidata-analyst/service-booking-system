<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'status',
    ];

    /* relationship with bookings */
    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
