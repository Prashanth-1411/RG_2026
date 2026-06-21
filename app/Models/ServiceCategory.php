<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'icon', 'service_type', 'sort_order', 'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function services()
    {
        return $this->hasMany(Service::class, 'category_id');
    }
}
