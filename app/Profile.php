<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    function user()
    {
    	# code...
    	return $this->belongsTo('App\User');
    }
}
