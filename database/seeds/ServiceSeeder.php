<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
        	['name' => 'Baranggay Clearance'],
        	['name' => 'Business Clearance'],
        	['name' => 'Building Clearance'],
        ];

        DB::table('services')->insert($services);
    }
}
