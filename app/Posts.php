<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    //
    protected $fillable = ['post_title','post_content'];

    public function Presenters()
    {
    	# code...
    	return $this->belongsTo('App\Presenter');
    }
}
