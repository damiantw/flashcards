<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function() {
	return view('about');
});

Route::get('/contact', function() {
	return view('contact');
});

Route::get('flashcards', 'FlashcardsController@index');
Route::get('flashcards/create', 'FlashcardsController@create');
Route::post('flashcards', 'FlashcardsController@store');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
