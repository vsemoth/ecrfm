<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Presenter extends Model
{
    //
    protected $fillable = ['presenter_id','show_name','time','day'];

    public function shows()
    {
    	# code...
    	return $this->belongsTo('App\Show');
    }
}
