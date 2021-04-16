<?php

use Illuminate\Database\Seeder;

class PhilippineRegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!DB::table('philippine_regions')->count()) {
            DB::unprepared(file_get_contents(__DIR__ . '/sql/philippine_regions.sql'));
        }
    }
}
