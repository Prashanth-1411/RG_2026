<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryImage extends Model
{
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
}
