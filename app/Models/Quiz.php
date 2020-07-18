<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Quiz extends Model
{
    public static function getCurrentQuiz()
    {
        $now = \Carbon\Carbon::now()->toDateTimeString();
        return self::active()
              ->where('start_at', '<', $now)
              ->where('available_until', '>', $now)
              ->orderBy('start_at', 'DESC')
              ->first();
    }

    public static function getNextQuiz()
    {
        $now = \Carbon\Carbon::now()->toDateTimeString();
        return self::active()
              ->where('start_at', '>', $now)
              ->orderBy('start_at', 'DESC')
              ->first();
    }

    # Scope
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    # Relationship
    public function questions()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function solutions()
    {
        return $this->hasMany('App\Models\Solution');
    }
}
