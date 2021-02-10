<?php

namespace App\Repositories ;
use App\comment;
use Auth;


class commentRepository 
{
	
	
	public function create($data) {

		try 
		{
			$post = new comment();
		    $post->comment = $data->comment;
    		$post->post_id = $data->post_id;
    		$post->user_id = Auth::user()->id;
    		$post->save();
    		
        
        } catch (Exception $e) {
           
           echo "error";
        }

       
		
	}


}