<?php

namespace App\Http\controllers ;
use App\user ;
use Illuminate\Http\Request;
use App\Repositories\userRepository;

class userController extends Controller
{
    private $userRepository;

    public function __construct(userRepository $userRepository) 
    {
        $this->userRepository = $userRepository;

    }


	public function profile($id)
	{

		$user = $this->userRepository->findById($id);
		return view('profile')->with('user' , $user);


	}

	public function profiles() 
	{

		$users = $this->userRepository->show();
		return view('profiles')->with('users' , $users);
	}


}