<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceArea extends Model
{
    protected $fillable = [
        'name', 'slug', 'region', 'is_active', 'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
