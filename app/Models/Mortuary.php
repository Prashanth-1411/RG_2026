<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Mortuary extends Model implements HasMedia
{
    use InteractsWithMedia;

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
        if ($this->image) {
            return str_starts_with($this->image, 'http') ? $this->image : asset('storage/' . $this->image);
        }
        $url = $this->getFirstMediaUrl('image');
        return $url ?: null;
    }
}
