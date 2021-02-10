<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    public function post()
    {
    	return $this->belongsTo(post::class);

    }
    public function user()
    {
    	return $this->belongsTo(user::class);

    }

    public function format()
    {
        return [
            'comment_id' => $this->id,
            'comment' => $this->comment,
            'user_name' => $this->user()->first()->name,
           
        ];
    }
    
}
