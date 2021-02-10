<?php


//users 
Route::get('/profiles', 'userController@profiles');
Route::get('/friends', 'FriendRequestController@index');
Route::get('/profile/{id}', 'userController@profile');
