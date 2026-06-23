<?php

namespace App\Models;

use App\Models\Concerns\HasImageBlobs;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasImageBlobs;

    protected $fillable = [
        'name', 'designation', 'bio', 'image', 'email', 'phone',
        'sort_order', 'status',
    ];

    protected $casts = [
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
