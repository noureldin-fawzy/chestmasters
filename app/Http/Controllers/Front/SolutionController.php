<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use \Carbon\Carbon;
use PDF;

use App\Models\Quiz;
use App\Models\Solution;
use App\Models\Question;
use App\Models\Answer;

class SolutionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function test(Quiz $quiz)
    {
      $response = [
        'success' => false,
        'data' => null,
        'msg' => ""
      ];

      $solution = null;
      if($quiz != null){
          $solutionExist = $quiz->solutions()->where('user_id', Auth::id())->first();
          if($solutionExist == null){
            $solution = $quiz->solutions()->create([
              'user_id' => Auth::id(),
              'start_at' => Carbon::now()->toDateTimeString()
            ]);

            $response['success'] = true;
            $response['data'] = $solution != null ? $solution->id : 0;
          }else{
            $response['msg'] = "Sorry, you can't take this quiz twice.";
          }
      }

      return $response;
    }

    public function create(Quiz $quiz)
    {
        $response = [
          'success' => false,
          'data' => null,
          'msg' => ""
        ];

        $solution = null;
        if($quiz != null){
            $solutionExist = $quiz->solutions()->where('user_id', Auth::id())->first();
            if($solutionExist == null){
              $solution = $quiz->solutions()->create([
                'user_id' => Auth::id(),
                'start_at' => Carbon::now()->toDateTimeString()
              ]);

              $response['success'] = true;
              $response['data'] = $solution != null ? $solution->id : 0;
            }else{
              $response['msg'] = "Sorry, you can't take this quiz twice.";
            }
        }
        return $response;
    }

    public function submitQuestion(Request $request){
      $solution_id = isset($_POST['solution_id']) ? $_POST['solution_id'] : 0;
      $question_id = isset($_POST['question_id']) ? $_POST['question_id'] : 0;
      $answer_id   = isset($_POST['answer_id']) ? $_POST['answer_id'] : 0;

      try {
        $answer = Answer::find($answer_id);
        $solution = Solution::find($solution_id);
        $solution->questions()->attach($question_id, ['answer_id' => $answer->id, 'points' => $answer->points ]);

        $solution->score = $solution->score + $answer->points;
        $solution->save();

        return true;
      } catch (\Exception $e) {
          return false;
      }
    }

    public function submit(Request $request){
      $response = [
        'success' => false,
        'msg' => ""
      ];

      try {
        $solution = Solution::find($request->solution_id);
        $solution->finish_at = Carbon::now()->toDateTimeString();
        $solution->save();

        $response['success'] = true;
      } catch (\Exception $e) {
        $response['msg'] = $e->getMessage();
      }

      return $response;
    }

    public function show(Solution $solution){

      $quiz = $solution->quiz()->with('questions.answers')->first();
      $solution = $solution->with('questions')->first();

      return view('front.quiz.result',[
        'quiz' => $quiz,
        'solution' => $solution
      ]);

    }

    // Generate PDF
    public function createPDF(Solution $solution) {
      // echo base64_encode(file_get_contents(asset('theme/assets/Content/en/images/logo-2.png')));
      // retreive records from db
      $quiz = $solution->quiz()->with('questions.answers')->first();
      $solution = $solution->with('questions')->first();

      $data = [
        'quiz' => $quiz,
        'solution' => $solution
      ];
      // dd($data);
      // share data to view
      $pdf = PDF::loadView('pdf.pdf_view', $data);

      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');

    }
}
