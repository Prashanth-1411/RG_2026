<?php

namespace App\Models;

use App\Models\Concerns\HasImageBlobs;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasImageBlobs;

    protected $fillable = [
        'company_name', 'tagline', 'email', 'phone_primary', 'phone_secondary',
        'phone_office', 'whatsapp', 'address', 'city', 'state', 'pincode',
        'logo', 'favicon', 'logo_width', 'logo_height', 'map_embed', 'facebook', 'twitter',
        'instagram', 'linkedin', 'youtube', 'established_year', 'iso_certified',
        'footer_text', 'footer_description', 'meta_keywords', 'meta_description',
    ];

    protected $casts = [
        'iso_certified' => 'boolean',
    ];

    protected function imageBlobFields(): array
    {
        return [
            'logo' => ['logo_blob', 'logo_mime'],
            'favicon' => ['favicon_blob', 'favicon_mime'],
        ];
    }
}
