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
            ['name' => 'Certificate of Indigency'],
            ['name' => 'Barangay (Fencing) Permit'],
            ['name' => 'Barangay (cutting of trees) Permit'],
            ['name' => 'Barangay (Development) Permit'],
            ['name' => 'Barangay (Outdoor Sign) Permit'],
            ['name' => 'Barangay (Terminal) Permit'],
            ['name' => 'Barangay (Transport Registration) Permit'],
            ['name' => 'Barangay (Organization Registration) Permit'],
            ['name' => 'Barangay (Survey) Permit'],
            ['name' => 'Barangay (Transport of fighting Cocks) Permit'],
            ['name' => 'Barangay (parade) Permit'],
            ['name' => 'Baranangay (Benefit Ball) Permit'],
            ['name' => 'Barangay (Lupon Tagapamayapa) Clearance'],
            ['name' => 'Baranangay (Manila Water Service) Connection Clearance'],
            ['name' => 'Katarungang Pambarangay Filling Fee'],
            ['name' => "Barangay Clearance for security Business/Mayor's Permit"],
            ['name' => 'Other Barangay Clearances and/or Permits'],
            ['name' => 'KP or (Lupon Tagapamayapa) Clearance'],
            ['name' => 'KP Filling fee'],
        ];

        DB::table('services')->insert($services);
    }
}
