<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyTimeline extends Model
{
    protected $table = 'company_timeline';

    protected $fillable = [
        'year', 'title', 'description', 'sort_order', 'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];
}
