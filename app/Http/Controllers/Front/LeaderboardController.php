<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

use App\Models\Quiz;

class LeaderboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $years = Quiz::select(DB::raw('YEAR(`start_at`) years'))->active()->groupBy('years')->orderBy('start_at', 'DESC')->get()->pluck('years')->toArray();
        foreach ($years as $year) {
          $months =  Quiz::select(DB::raw('MONTHNAME(`start_at`) months'))->active()->whereRaw("(YEAR(`start_at`)) = $year")->groupBy('months')->orderBy('start_at', 'DESC')->get()->pluck('months')->toArray();
          foreach ($months as $month) {
            $days = Quiz::select(DB::raw('DAY(`start_at`) days'))->active()->whereRaw("(MONTHNAME(`start_at`)) = '$month' ")->groupBy('days')->orderBy('start_at', 'DESC')->get()->pluck('days')->toArray();
            $response[$year][$month] = $days;
          }
        }

        return view('front.leaderboard', [
          'data' => $response
        ]);
    }

    public function months(Request $request){
      $year = $request->year;

      $response = [
        'success' => false,
        'data' => null,
        'msg' => ""
      ];
      try {
        $months =  Quiz::select(DB::raw('MONTHNAME(`start_at`) months'))
                        ->active()
                        ->whereRaw("(YEAR(`start_at`)) = $year")
                        ->groupBy('months')
                        ->orderBy('start_at', 'DESC')
                        ->get()->pluck('months')->toArray();

        $response['success'] = true;
        $response['data'] = $months;

      } catch (\Exception $e) {
        $response['msg'] = $e->getMessage();
      }

      return $response;
    }

    /*
    public function days(Request $request){

      return Quiz::select(DB::raw('MONTHNAME(`start_at`) months'))
                    ->active()
                    ->whereRaw("(YEAR(`start_at`)) = $year")
                    ->groupBy('months')
                    ->orderBy('start_at', 'DESC')
                    ->get()->pluck('months')->toArray();
    }
*/
}
