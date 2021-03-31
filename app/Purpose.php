<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
		protected $fillable = [
        'name',
        'service_id',
    ];

    public function service()
    {
    	return $this->belongsTo('App\Service');
    }

    public function requirements()
    {
    	return $this->belongsToMany('App\Requirement');
    }
}
