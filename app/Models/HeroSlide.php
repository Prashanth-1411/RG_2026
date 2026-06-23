<?php

namespace App\Models;

use App\Models\Concerns\HasImageBlobs;
use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    use HasImageBlobs;

    protected $fillable = [
        'title', 'subtitle', 'badge_text', 'image', 'video', 'button_text',
        'button_link', 'button_text_2', 'button_link_2', 'sort_order', 'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected function imageBlobFields(): array
    {
        return [
            'image' => ['image_blob', 'image_mime'],
        ];
    }
}
