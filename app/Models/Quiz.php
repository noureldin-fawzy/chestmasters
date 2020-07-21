<?php

namespace App\Models;

use DB;
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

    public static function getStartAtYears()
    {
        return self::select(DB::raw('YEAR(`start_at`) years'))
                    ->active()
                    ->groupBy('years')
                    ->orderBy('start_at', 'DESC')
                    ->get()->pluck('years')->toArray();
    }

    public static function getStartAtMonths($year)
    {
        return self::select(DB::raw('MONTHNAME(`start_at`) months'))
                    ->active()
                    ->whereRaw("(YEAR(`start_at`)) = $year")
                    ->groupBy('months')
                    ->orderBy('start_at', 'DESC')
                    ->get()->pluck('months')->toArray();
    }

    public static function getStartAtDays($month)
    {
        return self::select(DB::raw('DAY(`start_at`) days'))
                    ->active()
                    ->whereRaw("(MONTHNAME(`start_at`)) = '$month' ")
                    ->groupBy('days')
                    ->orderBy('start_at', 'DESC')
                    ->get()->pluck('days')->toArray();
    }

    public static function getByDate($year, $month, $day)
    {
      return self::active()
                  ->whereYear('start_at', '=', $year)
                  ->whereRaw("(MONTHNAME(`start_at`)) = '$month' ")
                  // ->whereMonth('start_at', '=', $month)
                  ->whereDay('start_at', '=', $day)->first();
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
