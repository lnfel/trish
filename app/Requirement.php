<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
		protected $fillable = [
        'name', 'description',
    ];

    public function services()
    {
    	return $this->belongsToMany('App\Service')->as('service')->withTimestamps();
    }

    public function purposes()
    {
    	return $this->belongsToMany('App\Purpose')->as('purposes');
    }
}
