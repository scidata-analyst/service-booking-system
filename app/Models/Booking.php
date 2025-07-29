<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'service_id',
        'booking_date',
        'status',
    ];

    /* relationship with user */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /* relationship with service */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
