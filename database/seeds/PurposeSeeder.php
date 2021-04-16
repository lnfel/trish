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
    	$bldgClearance = DB::table('services')->where('name', 'Baranggay (Building) Permit')->first();
      $fencingPermit = DB::table('services')->where('name', 'Baranggay (Fencing) Permit')->first();
      $cutTreePermit = DB::table('services')->where('name', 'Baranggay (cutting of trees) Permit')->first();
      $signPermit = DB::table('services')->where('name', 'Baranggay (Outdoor Sign) Permit')->first();
      $terminalPermit = DB::table('services')->where('name', 'Baranggay (Terminal) Permit')->first();
      $transPermit = DB::table('services')->where('name', 'Baranggay (Transport Registration) Permit')->first();
      $surveyPermit = DB::table('services')->where('name', 'Baranggay (Survey) Permit')->first();
      $waterClearance = DB::table('services')->where('name', 'Baranggay (Manila Water Service) Connection Clearance')->first();

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

      $fencingPermit = [
        ['name' => 'For Residencial', 'service_id' => $fencingPermit->id],
        ['name' => 'For Commercial', 'service_id' => $fencingPermit->id],
      ];

      $cutTreePermit = [
        ['name' => 'Non-fruit bearing trees', 'service_id' => $cutTreePermit->id],
        ['name' => 'Fruit bearing trees', 'service_id' => $cutTreePermit->id],
        ['name' => 'Special trees such as narra', 'service_id' => $cutTreePermit->id],
      ];

      $signPermit = [
        ['name' => 'Billboards', 'service_id' => $signPermit->id],
        ['name' => 'Advertisment Display', 'service_id' => $signPermit->id],
      ];

      $terminalPermit = [
        ['name' => 'Jeepney and FX taxi', 'service_id' => $terminalPermit->id],
        ['name' => 'Tricycle', 'service_id' => $terminalPermit->id],
      ];

      $transPermit = [
        ['name' => 'For motorized bicycle', 'service_id' => $transPermit->id],
        ['name' => 'For each pedaled tricycle', 'service_id' => $transPermit->id],
      ];

      $surveyPermit = [
        ['name' => 'Educational Survey', 'service_id' => $surveyPermit->id],
        ['name' => 'Business Survey', 'service_id' => $surveyPermit->id],
        ['name' => 'Others', 'service_id' => $surveyPermit->id],
      ];

      $waterClearance = [
        ['name' => 'Residential', 'service_id' => $waterClearance->id],
        ['name' => 'Commercial (Single Proprietor)', 'service_id' => $waterClearance->id],
        ['name' => 'Commercial (Partnership and Corporation)', 'service_id' => $waterClearance->id],
        ['name' => 'Factories/Companies', 'service_id' => $waterClearance->id],
        ['name' => 'Developers', 'service_id' => $waterClearance->id],
        ['name' => 'Homeowners Association', 'service_id' => $waterClearance->id],
      ];

      // seed to database
      DB::table('purposes')->insert($brgyClearancePurposes);
      DB::table('purposes')->insert($businessClearancePurposes);
      DB::table('purposes')->insert($bldgClearancePurposes);
    }
}
