<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Quiz extends Model
{
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
