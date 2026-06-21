<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $fillable = [
        'title', 'issuer', 'date_issued', 'image', 'type',
        'sort_order', 'status',
    ];

    protected $casts = [
        'date_issued' => 'date',
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];
}
