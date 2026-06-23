<?php

namespace App\Models;

use App\Models\Concerns\HasImageBlobs;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasImageBlobs;

    protected $fillable = [
        'page_name', 'heading', 'subheading', 'content', 'hero_image',
        'hero_video', 'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    protected function imageBlobFields(): array
    {
        return [
            'hero_image' => ['hero_image_blob', 'hero_image_mime'],
        ];
    }
}
