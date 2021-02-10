<?php

namespace App\Repositories ;
use App\user;


class userRepository 
{
	// to return all users without any conditions
	public function show()
	{
		$users =  user::all()->map->format();
        return $users;

	}
	// to find post by id of its user 
	public function findById($userId)
	{
		$user = user::where('id' , $userId )->firstOrFail()->format();
		return $user;
		 

	}



}