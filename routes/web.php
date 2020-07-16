<?php

use Illuminate\Support\Facades\Route;

// Front end routes
Route::group(['namespace' => 'Front', 'name' => 'front.'], function () {
    
    // Public Routes
    Route::get('/', 'FrontController@index')->name('home');


    // Authenticated Routes
    Route::middleware(['auth'])->group(function () {
        // Route::get('/home', 'FrontController@index')->name('home2');
    });
 
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Auth::routes();
