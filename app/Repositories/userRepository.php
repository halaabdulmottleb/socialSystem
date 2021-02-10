<?php

namespace App\Repositories ;
use App\user;
use Auth;


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

	public function uploadProfile($data) 
	{
		$user = Auth::user();
		if($data->hasFile('file'))
         {
            $file = $data->file('file');
            $filename =  $user->email .'-' . time() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('/Avatars');
            $file->move($destination , $filename );
            $user->profile =$filename;
            $user->save();
         }

	}



}