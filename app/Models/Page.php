<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'page_name', 'heading', 'subheading', 'content', 'hero_image',
        'hero_video', 'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
