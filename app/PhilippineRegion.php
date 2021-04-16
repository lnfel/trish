<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhilippineRegion extends Model
{
    public function provinces() {
		return $this->hasMany('App\PhilippineProvince');
	}

	public function cities() {
		return $this->hasMany('App\PhilippineCity');
	}

	public function baranggays() {
		return $this->hasMany('App\PhilippineBaranggay');
	}
}
