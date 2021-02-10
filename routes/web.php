<?php

Route::middleware(['auth'])->group(function () {
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
    Route::get('/home', 'PostController@index')->name('home');
});

    Auth::routes();