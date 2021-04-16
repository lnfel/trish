<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
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

	public function brgy() {
		return $this->belongsTo('App\PhilippineBaranggay');
	}
}
