<?php

namespace App\Http\Controllers\Front;

use DB;
use \Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Quiz;

class LeaderboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $response = array();
        $years = Quiz::getStartAtYears();
        foreach ($years as $year) {
          $months =  Quiz::getStartAtMonths($year);
          foreach ($months as $month) {
            $days = Quiz::getStartAtDays($month);
            $response[$year][$month] = $days;
          }
        }

        return view('front.leaderboard', [
          'data' => $response
        ]);
    }

    public function filter(Request $request){
      $year = $request->year;
      $month = $request->month;
      $day = $request->day;

      $quiz = Quiz::getByDate($year, $month, $day);

      $data['solutions'] = $quiz->solutions()->with('user')->orderBy('score', 'DESC')->orderBy('finish_at', 'ASC')->paginate(10);
      return \View::make("front.leaderboard-partial", $data)->renderSections()['content'];

    }
}
