<?php

namespace App\Models;

use App\Models\Concerns\HasImageBlobs;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasImageBlobs;

    protected $fillable = [
        'title', 'description', 'cover_image', 'sort_order', 'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function images()
    {
        return $this->hasMany(GalleryImage::class);
    }

    protected function imageBlobFields(): array
    {
        return [
            'cover_image' => ['cover_image_blob', 'cover_image_mime'],
        ];
    }
}
