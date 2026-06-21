<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceBrochure extends Model
{
    protected $fillable = [
        'service_id', 'brochure_file', 'brochure_name',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
