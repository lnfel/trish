<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'price',
    ];

    protected $with = ['purposes'];

    public function appointments()
    {
    	return $this->hasMany('App\Appointment');
    }

    public function requirements()
    {
        return $this->belongsToMany('App\Requirement')->as('requirement')->withTimestamps();
    }

    public function purposes()
    {
        return $this->hasMany('App\Purpose');
    }
}
