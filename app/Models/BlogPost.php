<?php

namespace App\Models;

use App\Models\Concerns\HasImageBlobs;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasImageBlobs;

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

    protected function imageBlobFields(): array
    {
        return [
            'featured_image' => ['featured_image_blob', 'featured_image_mime'],
            'image' => ['image_blob', 'image_mime'],
        ];
    }
}
