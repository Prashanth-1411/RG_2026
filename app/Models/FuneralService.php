<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class FuneralService extends Model implements HasMedia
{
    use InteractsWithMedia;

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
}
