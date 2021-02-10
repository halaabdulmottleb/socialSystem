<?php

namespace App\Http\Controllers;

use App\like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function likeUnlike($post_id)
    {

        if ($like = like::where('post_id', '=', $post_id )->where('user_id' , '=' , Auth()->user()->id)) 
            if($like->exists()) {
                $like->delete();
            }else{
                $like = new like();
                $like->user_id = Auth()->user()->id;
                $like->post_id = $post_id;
                $like->save();
            }
        return redirect()->back();
    }
}
