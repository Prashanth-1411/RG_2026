<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    protected $fillable = [
        'title', 'subtitle', 'badge_text', 'image', 'video', 'button_text',
        'button_link', 'button_text_2', 'button_link_2', 'sort_order', 'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];
}
