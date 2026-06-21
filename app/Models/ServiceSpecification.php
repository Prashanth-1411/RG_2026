<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceSpecification extends Model
{
    protected $fillable = [
        'service_id', 'spec_key', 'spec_value', 'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
