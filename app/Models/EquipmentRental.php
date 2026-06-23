<?php

namespace App\Models;

use App\Models\Concerns\HasImageBlobs;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class EquipmentRental extends Model implements HasMedia
{
    use HasImageBlobs, InteractsWithMedia;

    protected $fillable = [
        'name', 'slug', 'description', 'image', 'price',
        'features', 'is_available', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'features' => 'json',
            'price' => 'decimal:2',
            'is_available' => 'boolean',
        ];
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')->singleFile();
    }

    public function imageUrl(): ?string
    {
        return $this->getImageUrl('image');
    }

    protected function imageBlobFields(): array
    {
        return [
            'image' => ['image_blob', 'image_mime'],
        ];
    }
}
