<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SisterConcern extends Model
{
    protected $fillable = [
        'company_name', 'logo', 'description', 'website_link',
        'contact_phone', 'contact_email', 'sort_order', 'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];
}
