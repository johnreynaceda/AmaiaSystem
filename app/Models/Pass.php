<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pass extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pass_requests()
    {
        return $this->hasMany(PassRequest::class);
    }
}