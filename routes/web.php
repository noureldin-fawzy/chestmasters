<?php

use Illuminate\Support\Facades\Route;

// Front end routes
Route::group(['namespace' => 'Front', 'as' => 'front.'], function () {

    // Public Routes
    Route::get('/', 'FrontController@index')->name('home');
    Route::get('/leaderboard', 'LeaderboardController@index')->name('leaderboard');

    Route::post('/leaderboard/filter', 'LeaderboardController@filter')->name('ajax.leaderboard.filter');

    // Authenticated Routes
    Route::middleware(['auth'])->group(function () {

      Route::get('/test/{quiz}', 'SolutionController@test');

      Route::get('/quiz', 'QuizController@index')->name('quiz');

      Route::post('/solution/submit', 'SolutionController@submit')->name('ajax.solution.submit');
      Route::post('/solution/{quiz}', 'SolutionController@create')->name('ajax.solution.create');
      Route::post('/solution/question/submit', 'SolutionController@submitQuestion')->name('ajax.question.submit');

      Route::post('/quiz/question', 'QuizController@getNextQuestion')->name('ajax.question.next');
    });

});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();
