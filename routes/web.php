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

Route::view('/', 'welcome');

Route::view('/about', 'about');

Route::view('/contact', 'contact');

Route::get('flashcards', 'FlashcardsController@index');
Route::get('flashcards/create', 'FlashcardsController@create');
Route::post('flashcards', 'FlashcardsController@store');
Route::get('flashcards/{flashcard}', 'FlashcardsController@show')->name('flashcards.show');
Route::get('flashcards/{flashcard}/edit', 'FlashcardsController@edit');
Route::put('flashcards/{flashcard}', 'FlashcardsController@update');
Route::delete('flashcards/{flashcard}', 'FlashcardsController@destroy');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
