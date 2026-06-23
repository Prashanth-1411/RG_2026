<?php

namespace App\Models;

use App\Models\Concerns\HasImageBlobs;
use Illuminate\Database\Eloquent\Model;

class SisterConcern extends Model
{
    use HasImageBlobs;

    protected $fillable = [
        'company_name', 'logo', 'description', 'website_link',
        'contact_phone', 'contact_email', 'sort_order', 'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    protected function imageBlobFields(): array
    {
        return [
            'logo' => ['logo_blob', 'logo_mime'],
        ];
    }
}
