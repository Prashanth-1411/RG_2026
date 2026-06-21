<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'name', 'phone', 'pickup', 'destination', 'service_type',
        'booking_type', 'service_name', 'booking_date', 'notes',
        'status', 'ip_address',
    ];

    protected $casts = [
        'booking_date' => 'date',
    ];
}
