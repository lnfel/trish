<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhilippineCity extends Model
{
    public function region() {
		return $this->belongsTo('App\PhilippineRegion');
	}

	public function province() {
		return $this->belongsTo('App\PhilippineProvince');
	}
}
