<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Question extends Model
{
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    # Relationship
    public function answers()
    {
        return $this->hasMany('App\Models\Answer');
    }
}
