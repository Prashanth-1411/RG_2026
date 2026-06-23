<?php

namespace App\Models;

use App\Models\Concerns\HasImageBlobs;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Service extends Model implements HasMedia
{
    use HasImageBlobs, InteractsWithMedia;

    protected $fillable = [
        'title', 'slug', 'short_description', 'description', 'icon', 'image', 'banner_image',
        'category_id', 'service_type', 'is_featured', 'sort_order', 'status',
        'meta_title', 'meta_description', 'meta_keywords',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }

    public function features()
    {
        return $this->hasMany(ServiceFeature::class);
    }

    public function specifications()
    {
        return $this->hasMany(ServiceSpecification::class);
    }

    public function brochures()
    {
        return $this->hasMany(ServiceBrochure::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('gallery');
    }

    public function imageUrl(): ?string
    {
        return $this->getImageUrl('image');
    }

    public function bannerUrl(): ?string
    {
        return $this->getImageUrl('banner_image') ?: $this->imageUrl();
    }

    protected function imageBlobFields(): array
    {
        return [
            'image' => ['image_blob', 'image_mime'],
            'banner_image' => ['banner_image_blob', 'banner_image_mime'],
        ];
    }
}
