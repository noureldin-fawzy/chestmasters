<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Carbon\Carbon;

use App\Models\Quiz;
use App\Models\Solution;

class QuizController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index()
    {
        $quizType = "";
        $quiz = null;

        // 1. check if active and available quiz
        $currentQuiz = Quiz::getCurrentQuiz();

        // 2. if not check for upcoming Quiz
        if($currentQuiz != null){
          $questions = $currentQuiz->questions()->active()->get();
          $currentQuiz->questionsCount = $questions->count();
          $currentQuiz->questionsTime = $questions->sum('time');
          $currentQuiz->questionsIds = $questions->pluck('id');

          $quizType = "current";
          $quiz = $currentQuiz;
        }else{
          $nextQuiz = Quiz::getNextQuiz();
          $quizType = "next";
          $quiz = $nextQuiz;

          // 3. no available quiz
          if($nextQuiz == null){
            $quizType = "noAvailable";
            $quiz = null;
          }
        }

        return view('front.quiz',[
          'quizType' => $quizType,
          'quiz' => $quiz
        ]);
    }

    public function getNextQuestion(Request $request)
    {
        $solution_id = $request->solution_id;
        $solution = Solution::find($solution_id);
        $solutionQuestionsIds = $solution->questions()->pluck('question_id');

        $quiz = $solution->quiz;
        $question = $quiz->questions()->active()->whereNotIn('id', $solutionQuestionsIds)->inRandomOrder()->first();

        if($question != null){
          # Question exist
          $data = [
            "isExist"              => true,
            "quiz"                 => $quiz,
            "activeQuestionsCount" => $quiz->questions()->active()->count(),
            "solved"               => $solutionQuestionsIds->count(),
            "question"             => $question,
            "answers"              => $question->answers()->active()->get()
          ];

        }else{
          # No question exist
          $data = [
            "isExist" => false,
            "quiz" => $quiz
          ];
        }
        return \View::make("front.question", $data)->renderSections()['content'];

    }
}
