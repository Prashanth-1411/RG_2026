<?php

namespace App\Models;

use App\Models\Concerns\HasImageBlobs;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasImageBlobs;

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

    protected function imageBlobFields(): array
    {
        return [
            'image' => ['image_blob', 'image_mime'],
        ];
    }
}
