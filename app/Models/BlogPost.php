<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    protected $fillable = [
        'title', 'slug', 'content', 'excerpt', 'featured_image', 'image',
        'category_id', 'tags', 'author', 'reading_time', 'views',
        'meta_title', 'meta_description', 'is_featured', 'status',
    ];

    protected $casts = [
        'views' => 'integer',
        'is_featured' => 'boolean',
        'status' => 'boolean',
    ];

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }
}
