<?php

namespace App\Http\Controllers;

use App\friendRequest;
use Illuminate\Http\Request;
use App\User;
use Auth;
use App\Repositories\friendRequestRepository;


class FriendRequestController extends Controller
{
     private $friendRequestRepository;

    public function __construct(friendRequestRepository $friendRequestRepository) 
    {
        $this->friendRequestRepository = $friendRequestRepository;

    }


    public function destroy($id)
    {
        $this->friendRequestRepository->destroy($id);
        return redirect()->back();
    }
}
