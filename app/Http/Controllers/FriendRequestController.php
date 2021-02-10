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

    public function sendRequest($id) 
    {
         $this->friendRequestRepository->create($id);

        return redirect()->back();

    }

   public function unSendRequest($id) 
    {
         $this->friendRequestRepository->deleteByUserID($id);

        return redirect()->back();

    }
   public function acceptRequest($request_id , $sender_id) 
    {
         $this->friendRequestRepository->accept($request_id , $sender_id);

         return redirect()->back();

    }


    public function destroy($id)
    {
        $this->friendRequestRepository->destroy($id);
        return redirect()->back();
    }
}
