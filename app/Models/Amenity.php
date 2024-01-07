<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function amenity_requests()
    {
        return $this->hasMany(AmenityRequest::class);
    }
}