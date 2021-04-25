<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
	protected $fillable = [
    'street_address', 'region_code', 'province_code', 'city_municipality_code', 'baranggay_code', 'zip_code',
  ];

	// $this->belongsTo(Model, foreign_key, local_key);
	// $this->belongsTo('App\PhilippineRegion', 'region_code');
  public function region() {
		return $this->belongsTo('App\PhilippineRegion', 'region_code', 'region_code');
	}

	public function province() {
		return $this->belongsTo('App\PhilippineProvince', 'province_code', 'province_code');
	}

	public function city() {
		return $this->belongsTo('App\PhilippineCity', 'city_municipality_code', 'city_municipality_code');
	}

	public function brgy() {
		return $this->belongsTo('App\PhilippineBaranggay', 'baranggay_code', 'baranggay_code');
	}

	public function user() {
		return $this->belongsTo('App\User');
	}
}
