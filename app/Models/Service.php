<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Service extends Model implements HasMedia
{
    use InteractsWithMedia;

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
        if ($this->image) {
            return str_starts_with($this->image, 'http') ? $this->image : asset('storage/' . $this->image);
        }
        return $this->getFirstMediaUrl('gallery') ?: null;
    }

    public function bannerUrl(): ?string
    {
        if ($this->banner_image) {
            return str_starts_with($this->banner_image, 'http') ? $this->banner_image : asset('storage/' . $this->banner_image);
        }
        return $this->imageUrl();
    }
}
