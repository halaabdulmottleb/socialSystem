<?php

namespace App\Repositories ;
use App\friendRequest;
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