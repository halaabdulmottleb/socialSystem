<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
	public function format()
	{
		return [
			'post_id' => $this->id,
			'post_content' => $this->content,
			'post_created_at' => $this->created_at->diffForHumans(),
			'post_updated_at' => $this->updated_at->diffForHumans(),
			'user' => $this->user()->first(),
			'comments' => $this->comments()->get()->map->format(),
			'likes' => $this->likes()->get(),
		];
	}

    public function user()
    {

    	return $this->belongsTo(User::class);

    }

    public function comments ()
    {
    	return $this->hasMany(comment::class);
    }

    public function likes ()
    {
    	return $this->hasMany(like::class);
    }
}
