<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'paid',
    ];

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
