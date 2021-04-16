<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhilippineProvince extends Model
{
    public function region() {
		return $this->belongsTo('App\PhilippineRegion', 'region_code');
	}

	public function cities() {
		return $this->hasMany('App\PhilippineCity', 'province_code');
	}

	public function addresses() {
		return $this->hasMany('App\PhilippineAddress', 'province_code');
	}
}
