<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class friendRequest extends Model
{
    public function format()
    {
    	return 
    	[
    		'id' => $this->id,
    		'from_id' => $this->from_id,
    		'from_name' => $this->from()->first()->name,
    		'created_id' => $this->created_at->diffForHumans(),
    	];

    }

    public function from()
    {
    	return $this->belongsTo(User::class , 'from_id');

    }
}
