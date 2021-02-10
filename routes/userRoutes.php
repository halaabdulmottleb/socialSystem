<?php

Route::middleware(['auth'])->group(function () {

    Route::get('/profiles', 'userController@profiles');
    Route::get('/friends', 'FriendRequestController@index');
    Route::get('/profile/{id}', 'userController@profile');
    Route::get('/profile/{id}', 'userController@profile');
    // request 
    Route::post('/friends/sendRequest/{id}', 'FriendRequestController@sendRequest')->name('sendRequest');
    Route::post('/friends/unSendRequest/{id}', 'FriendRequestController@unSendRequest')->name('unSendRequest');
    Route::post('/Request/{id}/delete', 'FriendRequestController@destroy')->name('deleteRequest');  
    // profile  // 
    Route::post('/profilePicture/upload', 'userController@uploadProfile')->name('uploadProfile');  


});


