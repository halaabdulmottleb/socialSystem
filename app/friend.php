<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class friend extends Model
{
    public function fromUser(){
    	return $this->belongsTo(User::class , 'user_one');
    }
    public function toUser(){
    	return $this->belongsTo(User::class , 'user_two');
    }

    public function format()
    {
    	return 
    	[
    		'user_two_id'   => $this->fromUser()->first()->id,
    		'user_two_name' => $this->fromUser()->first()->name,
    		'user_one_name' => $this->toUser()->first()->name,
    		'user_one_id'   => $this->toUser()->first()->id,
    	];

    }
    
}
