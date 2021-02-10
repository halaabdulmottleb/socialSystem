<?php

namespace App\Http\Controllers;

use App\friendRequest;
use Illuminate\Http\Request;
use App\User;
use Auth;

class FriendRequestController extends Controller
{

   
  
    public function destroy($id)
    {
        friendRequest::findOrFail($id)->delete();
        return redirect()->back();
    }
}
