<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function service()
    {
    	return $this->belongsTo('App\Service');
    }

    public function slot()
    {
    	return $this->belongsTo('App\Slot');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
