<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoMetum extends Model
{
    protected $table = 'seo_meta';

    protected $fillable = [
        'page_name', 'meta_title', 'meta_description', 'meta_keywords',
        'og_title', 'og_description', 'og_image', 'structured_data', 'canonical_url',
    ];
}
