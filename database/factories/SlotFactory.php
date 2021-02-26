<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Slot;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Slot::class, function (Faker $faker) {
		// $faker->time($format = 'h:i A', $max = '05:30 PM')
		// https://stackoverflow.com/questions/14186800/random-time-and-date-between-2-date-values
		// randomize time between min and max time values
		$min_epoch = strtotime('06:00 AM');
    $max_epoch = strtotime('05:30 PM');

    $rand_epoch = rand($min_epoch, $max_epoch);

    return [
        'date' => date_format($faker->dateTimeBetween($startDate = 'now', $endDate = '+3 months'), "Y-m-d"),
        'time' => date('h:i A', $rand_epoch),
        'slots_left' => 10,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
