<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PassRequest extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pass()
    {
        return $this->belongsTo(Pass::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}