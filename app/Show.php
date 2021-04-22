<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    // Protect fillable fields
    protected $fillable = ['show_id','first','last','birthday','start_date'];

    public function presenters()
    {
    	# Return presenter model
    	return $this->belongsTo('App\Presenter');
    }
}
