<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Specialty extends Model
{
  # Scope
  public function scopeActive($query)
  {
      return $query->where('active', 1);
  }
}
