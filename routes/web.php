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
// posts
Route::get('/', 'PostController@index');
Route::get('/post/{id}', 'PostController@show');
Route::post('/post', 'postController@create')->name('addPost');
// comments
Route::post('/comment', 'commentController@addComment')->name('addComment');
//like unlike
Route::post('/post/like/{id}', 'likeController@likeUnlike')->name('likeUnlike');

//request 

Route::post('/Request/{id}/delete', 'FriendRequestController@destroy')->name('deleteRequest');


Route::get('/profile/{id}', 'userController@profile');
Auth::routes();
Route::get('/home', 'PostController@index')->name('home');
