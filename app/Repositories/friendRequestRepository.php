<?php

namespace App\Repositories ;
use App\friendRequest;
use App\friend;
use Auth ;


class friendRequestRepository 
{
	public function create ($to_id) 
	{

		try
		{
			$request          = new friendRequest() ;
		    $request->from_id = Auth::user()->id;
    		$request->to_id   = $to_id;
    		$request->save();
    	
		}  catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
           
        }

	}
	public function accept($request_id , $sender_id) 
    {

        try
        {
            $relation            = new friend() ;
            $relation->user_one  = $sender_id;
            $relation->user_two  = Auth::user()->id;
            $relation->save();
        
        }  catch(\Illuminate\Database\QueryException $e){
            $errorCode = $e->errorInfo[1];
           
        }

        // delete request 
        friendRequest::findOrFail($request_id)->delete();


    }
    
	public function destroy($id)
    {
        friendRequest::findOrFail($id)->delete();
        return redirect()->back();
    }

    public function deleteByUserID($id) 
    {
    	friendRequest::where('to_id' , '=' , $id)->where('from_id' , '=' , Auth::user()->id)->delete();

    }
	


}