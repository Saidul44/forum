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

	if (!env('INSTALLED', false)) {
        Route::get('/', 'Install\InstallController@index');
        Route::post('install/store', 'Install\InstallController@store');
    } else {
        Route::get('/', 'HomeController@index');
    }

Auth::routes();

// Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/all_topics', 'HomeController@index');
Route::resource('topic', 'Topic\TopicController');
Route::get('thread-detail/{thread}', 'Thread\ThreadController@thread_detail');
Route::resource('threads', 'Thread\ThreadController');
Route::post('reply_store', 'Comment\CommentController@reply_store');
Route::post('load_reply', 'Comment\CommentController@load_reply');
Route::resource('comment', 'Comment\CommentController');
Route::get('search', 'HomeController@search');
