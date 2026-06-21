<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactInquiry extends Model
{
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'subject', 'message',
        'is_read', 'status', 'ip_address',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];
}
