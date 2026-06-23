<?php

namespace App\Models;

use App\Models\Concerns\HasImageBlobs;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Mortuary extends Model implements HasMedia
{
    use HasImageBlobs, InteractsWithMedia;

    protected $fillable = [
        'title', 'slug', 'description', 'image', 'features', 'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'features' => 'array',
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
