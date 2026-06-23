<?php

namespace App\Models;

use App\Models\Concerns\HasImageBlobs;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasImageBlobs;

    protected $fillable = [
        'title', 'issuer', 'date_issued', 'image', 'type',
        'sort_order', 'status',
    ];

    protected $casts = [
        'date_issued' => 'date',
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected function imageBlobFields(): array
    {
        return [
            'image' => ['image_blob', 'image_mime'],
        ];
    }
}
