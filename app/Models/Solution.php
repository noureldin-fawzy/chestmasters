<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Solution extends Model
{
  protected $guarded = [];

  public function quiz()
  {
    return $this->belongsTo('App\Models\Quiz');
  }

  public function user()
  {
      return $this->belongsTo('App\User');
  }

  public function questions()
  {
      return $this->belongsToMany('App\Models\Question')->withPivot(['answer_id', 'points']);
  }
}
