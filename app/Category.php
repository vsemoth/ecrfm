<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';

    // Category ProfileImage Relationship
    public function images()
    {
    	# code...
    	return $this->hasMany('App\Image');
    }

    // Category ProfileImage Relationship
    public function profiles()
    {
    	# code...
    	return $this->hasMany('App\Profile');
    }

    // Category Posts Relationship
    public function posts()
    {
    	# code...
    	return $this->hasMany('App\Post');
    }
}
