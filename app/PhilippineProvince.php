<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhilippineProvince extends Model
{
    public function region() {
		return $this->belongsTo('App\PhilippineRegion');
	}
}
