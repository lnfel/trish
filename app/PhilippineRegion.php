<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhilippineRegion extends Model
{
    public function provinces() {
		return $this->hasMany('App\PhilippineProvince', 'region_code');
	}

	public function cities() {
		return $this->hasMany('App\PhilippineCity', 'region_code');
	}

	public function brgys() {
		return $this->hasMany('App\PhilippineBaranggay', 'region_code');
	}

	public function addresses() {
		return $this->hasMany('App\PhilippineAddress', 'region_code');
	}
}
