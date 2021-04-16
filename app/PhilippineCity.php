<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhilippineCity extends Model
{
    public function region() {
		return $this->belongsTo('App\PhilippineRegion', 'region_code');
	}

	public function province() {
		return $this->belongsTo('App\PhilippineProvince', 'province_code');
	}

	public function brgys() {
		return $this->hasMany('App\PhilippineBaranggay', 'city_municipality_code');
	}

	public function addresses() {
		return $this->hasMany('App\PhilippineAddress', 'city_municipality_code');
	}
}
