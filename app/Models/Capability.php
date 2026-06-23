<?php

namespace App\Models;

use App\Models\Concerns\HasImageBlobs;
use Illuminate\Database\Eloquent\Model;

class Capability extends Model
{
    use HasImageBlobs;

    protected $fillable = [
        'title', 'description', 'image', 'icon', 'sort_order', 'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected function imageBlobFields(): array
    {
        return [
            'image' => ['image_blob', 'image_mime'],
            'icon' => ['icon_blob', 'icon_mime'],
        ];
    }
}
