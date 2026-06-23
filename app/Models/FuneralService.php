<?php

namespace App\Models;

use App\Models\Concerns\HasImageBlobs;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class FuneralService extends Model implements HasMedia
{
    use HasImageBlobs, InteractsWithMedia;

    protected $fillable = [
        'title', 'slug', 'short_description', 'description', 'icon', 'image', 'banner_image',
        'features', 'gallery', 'sort_order', 'status',
        'meta_title', 'meta_description', 'meta_keywords',
    ];

    protected $casts = [
        'features' => 'array',
        'gallery' => 'array',
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery');
    }

    protected function imageBlobFields(): array
    {
        return [
            'image' => ['image_blob', 'image_mime'],
            'banner_image' => ['banner_image_blob', 'banner_image_mime'],
        ];
    }
}
