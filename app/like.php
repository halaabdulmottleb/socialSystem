<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    public function user() {

    	$this->belongsTo(User::class);
    }
}
