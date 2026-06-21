<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FuneralBooking extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'customer_name', 'phone', 'email', 'address', 'service_type',
        'deceased_name', 'service_date', 'special_requests', 'status',
        'admin_notes', 'ip_address',
    ];

    protected $casts = [
        'service_date' => 'date',
    ];

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeConfirmed($query)
    {
        return $query->where('status', 'confirmed');
    }

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }
}
