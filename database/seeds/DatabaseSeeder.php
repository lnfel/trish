<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
    	$this->call([
      	ServiceSeeder::class,
      	PurposeSeeder::class,
      	RequirementSeeder::class,
      	PhilippineRegionSeeder::class,
        PhilippineProvinceSeeder::class,
        PhilippineCitySeeder::class,
        PhilippineBaranggaySeeder::class,
      ]);
    }
}
