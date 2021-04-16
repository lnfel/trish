<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhilippineBaranggay extends Model
{
    public function region() {
		return $this->belongsTo('App\PhilippineRegion');
	}

	public function province() {
		return $this->belongsTo('App\PhilippineProvince');
	}

	public function city() {
		return $this->belongsTo('App\PhilippineCity');
	}

	public function addresses() {
		return $this->hasMany('App\PhilippineAddress', 'baranggay_code');
	}
}
