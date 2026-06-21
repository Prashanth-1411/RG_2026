<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Capability extends Model
{
    protected $fillable = [
        'title', 'description', 'image', 'icon', 'sort_order', 'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];
}
