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

// Home page
Route::get('/', 'HomeController@index')->name('home');

// User registration
Route::get('/register', 'RegisterController@create')->name('register');
Route::post('/register', 'RegisterController@store')->name('register.store');

// User login
Route::get('/login', 'LoginController@create')->name('login');
Route::post('/login', 'LoginController@store')->name('login.store');

// User logout
Route::get('/logout', 'LoginController@destroy')->name('logout');

// Questions - Read
Route::get('/questions', 'QuestionsController@index')->name('questions');
Route::get('/questions/{question}', 'QuestionsController@show')->name('questions.show');

// Questions - Create
Route::get('/create-question', 'QuestionsController@create')->name('questions.create');
Route::post('/questions', 'QuestionsController@store')->name('questions.store');

// Questions - Update
Route::get('/questions/{question}/edit', 'QuestionsController@edit')->name('questions.edit');
Route::put('/questions/{question}', 'QuestionsController@update')->name('questions.update');

// Questions - Delete
Route::delete('/questions/{question}', 'QuestionsController@destroy')->name('questions.destroy');