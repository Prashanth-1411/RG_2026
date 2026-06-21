<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class EquipmentRental extends Model implements HasMedia
{
    use InteractsWithMedia;

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
        if ($this->image) {
            return str_starts_with($this->image, 'http') ? $this->image : asset('storage/' . $this->image);
        }
        $url = $this->getFirstMediaUrl('image');
        return $url ?: null;
    }
}
