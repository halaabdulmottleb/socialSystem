<?php

Route::middleware(['auth'])->group(function () {
    Route::get('/profiles', 'userController@profiles');
    Route::get('/friends', 'FriendRequestController@index');
    Route::get('/profile/{id}', 'userController@profile');
    // send request 
    Route::post('/friends/sendRequest/{id}', 'FriendRequestController@sendRequest')->name('sendRequest');
    Route::post('/friends/unSendRequest/{id}', 'FriendRequestController@unSendRequest')->name('unSendRequest');

});


