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

Auth::routes();

Route::resource('/', 'TopicsController');
// Route::get('/home', 'HomeController@index');
Route::get('/all_topics', 'HomeController@index');
Route::get('/add_topic', 'HomeController@index');
Route::get('threads', 'ThreadsController@index');
