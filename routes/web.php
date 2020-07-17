<?php

use Illuminate\Support\Facades\Route;

// Front end routes
Route::group(['namespace' => 'Front', 'as' => 'front.'], function () {

    // Public Routes
    Route::get('/', 'FrontController@index')->name('home');


    // Authenticated Routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/quiz', function(){
          echo 'Hello Quiz';
        })->name('quiz');
    });

});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();
