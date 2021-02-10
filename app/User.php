<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts(){

        return $this->hasMany(post::class);
    }
    // to get user's requests
    public function requests(){

        return $this->hasMany(friendRequest::class , 'to_id');
    }
    
   public function sendRequests(){

        return $this->hasMany(friendRequest::class , 'from_id');
    }
    

    public function format()
    {
        return [
            'user_id' => $this->id,
            'user_name' => $this->name,
            'user_email' => $this->email,
            'posts' => $this->posts()->get()->map->format(),
            'requests' => $this->requests()->get()->map->format(),
           
        ];
    }


}
