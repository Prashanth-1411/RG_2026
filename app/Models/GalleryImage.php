<?php

namespace App\Models;

use App\Models\Concerns\HasImageBlobs;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
    use HasImageBlobs;

    protected $fillable = [
        'album_id', 'title', 'image', 'alt_text', 'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    protected function imageBlobFields(): array
    {
        return [
            'image' => ['image_blob', 'image_mime'],
        ];
    }
}
