<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Quiz;
use App\Models\Slider;
use App\Models\Contact;

class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

      $latestQuizSolutions = array();
      $latestAvailableQuiz = Quiz::available()->latest()->first();
      if($latestAvailableQuiz != null){
        $latestQuizSolutions = $latestAvailableQuiz->solutions()->with('user')->orderBy('score', 'DESC')->orderBy('finish_at', 'ASC')->limit(3)->get();
      }

      $quizType = "";
      $quiz = null;

      // 1. check if active and available quiz
      $currentQuiz = Quiz::getCurrentQuiz();

      // 2. if not check for upcoming Quiz
      if($currentQuiz != null){
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

        return view('front.home', [
          'sliders'  => Slider::active()->get(),
          'quizType' => $quizType,
          'quiz' => $quiz,
          'latestQuizSolutions' => $latestQuizSolutions
        ]);
    }

    public function contactUs()
    {
        return view('front.contact');
    }

    public function sendMessage(Request $request)
    {
      $this->validate($request, [
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255',
          'message' => 'required|string',
      ]);

      $contact = Contact::create([
        'name' => $request->name,
        'email' => $request->email,
        'message' => $request->message
      ]);

       return redirect()->back()->with('success', 'Your message has been sent successfully');
    }

    public function showPage(\TCG\Voyager\Models\Page $page)
    {
        return view('front.page', [
          'page' => $page
        ]);

    }
}
