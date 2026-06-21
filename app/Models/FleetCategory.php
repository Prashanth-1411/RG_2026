<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FleetCategory extends Model
{
    protected $fillable = [
        'name', 'slug', 'subtitle', 'description', 'image', 'type', 'sort_order', 'status',
    ];

    protected $casts = [
        'status' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function fleets()
    {
        return $this->hasMany(Fleet::class)->orderBy('sort_order');
    }

    public function imageUrl(): ?string
    {
        if (!$this->image) {
            return null;
        }
        return str_starts_with($this->image, 'http') ? $this->image : asset('storage/' . $this->image);
    }
}
