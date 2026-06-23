<?php

namespace App\Models;

use App\Models\Concerns\HasImageBlobs;
use Illuminate\Database\Eloquent\Model;

class FleetCategory extends Model
{
    use HasImageBlobs;

    protected $fillable = [
        'name', 'slug', 'subtitle', 'description', 'image', 'type', 'sort_order', 'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function fleets()
    {
        return $this->hasMany(Fleet::class)->orderBy('sort_order');
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
