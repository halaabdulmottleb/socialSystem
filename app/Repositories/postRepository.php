<?php

namespace App\Repositories ;
use App\post;
use Auth;


class postRepository 
{
	// to return all posts without any conditions
	public function all()
	{
		$posts =  post::orderBy('content')->get()->map->format();
        return $posts;

	}
	// to find post by id of its user 
	public function findById($postId)
	{
		$post = post::where('id' , $postId )->firstOrFail();
		return $post->format();
		 
	}

	public function addPost($data) {

		try 
		{
			$post = new post();
		    $post->content = $data->postContent;
    		$post->user_id = Auth::user()->id;
    		$post->save();
        
        } catch (Exception $e) {
           
           echo "error";
        }

       
		
	}


}