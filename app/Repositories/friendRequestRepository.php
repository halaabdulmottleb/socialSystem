<?php

namespace App\Repositories ;
use App\friendRequest;


class friendRequestRepository 
{
	
	public function destroy($id)
    {
        friendRequest::findOrFail($id)->delete();
        return redirect()->back();
    }
	


}