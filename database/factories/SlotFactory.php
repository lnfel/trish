<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Slot;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Carbon\Carbon;

$factory->define(Slot::class, function (Faker $faker) {
		// $faker->time($format = 'h:i A', $max = '05:30 PM')
		// https://stackoverflow.com/questions/14186800/random-time-and-date-between-2-date-values
		// randomize time between min and max time values
		$min_epoch = strtotime('06:00 AM');
    $max_epoch = strtotime('05:30 PM');

    $rand_epoch = rand($min_epoch, $max_epoch);
    //date('h:i A', $rand_epoch)
    //Carbon::parse($rand_epoch)->format('h:i A')
    return [
        'date' => date_format($faker->dateTimeBetween($startDate = 'now', $endDate = '+3 months'), "Y-m-d"),
        'time' => Carbon::createFromTimestamp($rand_epoch)->format("h:i:s A"),
        'slots_left' => 10,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
