<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    protected $fillable = [
        'label', 'value', 'suffix', 'icon', 'sort_order', 'status',
    ];

    protected $casts = [
        'value' => 'integer',
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];
}
