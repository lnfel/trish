<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// get services info
    	$brgyClearance = DB::table('services')->where('name', 'Baranggay Clearance')->first();
    	$businessClearance = DB::table('services')->where('name', 'Business Clearance')->first();
    	$bldgClearance = DB::table('services')->where('name', 'Building Clearance')->first();

    	// assign purposes to services
      $brgyClearancePurposes = [
      	['name' => 'Local employment', 'service_id' => $brgyClearance->id],
      	['name' => 'National ID', 'service_id' => $brgyClearance->id],
      	['name' => 'Police Clearance', 'service_id' => $brgyClearance->id],
      	['name' => 'Postal ID', 'service_id' => $brgyClearance->id],
      	['name' => 'Passport', 'service_id' => $brgyClearance->id],
      	['name' => 'NBI Clearance', 'service_id' => $brgyClearance->id],
      	['name' => 'TESDA', 'service_id' => $brgyClearance->id],
      	['name' => 'PRC Board Exam', 'service_id' => $brgyClearance->id],
      	['name' => 'PVAO (Senior)', 'service_id' => $brgyClearance->id],
      	['name' => 'Scholarship', 'service_id' => $brgyClearance->id],
      	['name' => 'Money transfer', 'service_id' => $brgyClearance->id],
      	['name' => 'Others: Avon, Personal Collection', 'service_id' => $brgyClearance->id],
      	['name' => 'For Traveling: Abroad and Local', 'service_id' => $brgyClearance->id],
      	['name' => 'For Legal: Probation and Bond', 'service_id' => $brgyClearance->id],
      	['name' => 'Loan Requirement Purposes', 'service_id' => $brgyClearance->id],
      	['name' => 'Bank Requirement Purposes', 'service_id' => $brgyClearance->id],
      	['name' => 'Meralco and Manila Water', 'service_id' => $brgyClearance->id],
      ];

      $businessClearancePurposes = [
      	['name' => 'Single / Sole Proprietorship', 'service_id' => $businessClearance->id],
      	['name' => 'Corporation / Incorporation', 'service_id' => $businessClearance->id],
      ];

      $bldgClearancePurposes = [
      	['name' => 'Renovation / Repair', 'service_id' => $bldgClearance->id],
      	['name' => 'New Building for Construction', 'service_id' => $bldgClearance->id],
      ];

      // seed to database
      DB::table('purposes')->insert($brgyClearancePurposes);
      DB::table('purposes')->insert($businessClearancePurposes);
      DB::table('purposes')->insert($bldgClearancePurposes);
    }
}
