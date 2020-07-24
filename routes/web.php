<?php

use Illuminate\Support\Facades\Route;

// Front end routes
Route::group(['namespace' => 'Front', 'as' => 'front.'], function () {

    // Public Routes
    Route::get('/', 'FrontController@index')->name('home');
    Route::get('/contact-us', 'FrontController@contactUs')->name('contact-us');
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

      Route::get('/solution/{solution}/show', 'SolutionController@createPDF')->name('solution.show');

      Route::get('/profile', 'ProfileController@index')->name('user.profile.show');
      Route::get('/profile/edit', 'ProfileController@edit')->name('user.profile.edit');
      Route::put('/profile/edit', 'ProfileController@update')->name('user.profile.update');
    });
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();
