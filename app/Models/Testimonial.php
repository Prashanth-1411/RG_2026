<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name', 'position', 'designation', 'category', 'content', 'rating',
        'image', 'verification_url', 'is_featured', 'is_approved', 'sort_order',
    ];

    protected $casts = [
        'rating' => 'integer',
        'is_featured' => 'boolean',
        'is_approved' => 'boolean',
        'sort_order' => 'integer',
    ];
}
