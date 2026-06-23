<?php

namespace App\Models;

use App\Models\Concerns\HasImageBlobs;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Fleet extends Model implements HasMedia
{
    use HasImageBlobs, InteractsWithMedia;

    protected $fillable = [
        'fleet_category_id', 'name', 'slug', 'category', 'description', 'image',
        'specifications', 'is_available', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'specifications' => 'array',
            'is_available' => 'boolean',
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('main_image')->singleFile();
        $this->addMediaCollection('gallery');
    }

    public function fleetCategory()
    {
        return $this->belongsTo(FleetCategory::class);
    }

    public function mainImageUrl(): ?string
    {
        return $this->getImageUrl('image');
    }

    public function galleryUrls(): array
    {
        return $this->getMedia('gallery')->map(fn ($m) => $m->getUrl())->toArray();
    }

    protected function imageBlobFields(): array
    {
        return [
            'image' => ['image_blob', 'image_mime'],
        ];
    }
}
