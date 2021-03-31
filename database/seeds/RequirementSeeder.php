<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Requirement;
use App\Purpose;

class RequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setCollection = [];
        $ids = [];

        // requirements
        $requirements = [
            ["name" => "Cedula",],
            ["name" => "Valid ID",],
            ["name" => "(Passport if international)",],
            ["name" => "Sketch, Information case",],
            ["name" => "Homeowner's certfication",],
            ["name" => "Leasing contract if renting",],
            ["name" => "DTI (if sari-sari store kahit wala na DTI)",],
            ["name" => "if renewal: Old Brgy. Business Clearance",],
            ["name" => "(if sa premises ng Subd. or Sitios and business Address)",],
            ["name" => "SEC Certificate with complete attachment of Articles of Incorporation",],
            ["name" => "If representatives only: Authorization letter with valid ID of owner and representative",],
            ["name" => "Transfer certificate of title",],
            ["name" => "Tax Declaration",],
            ["name" => "Site Development Plan (Blueprint with complete attachment) or kahit sketch nung irerenovate na property at picture nung parte ng building na irerenovate",],
            ["name" => "Valid ID (at least 2)",],
        ];

        //DB::table('requirements')->insert($requirements);

        $cedula = Requirement::where('name', 'Cedula')->first();
        $validId = Requirement::where('name', 'Valid ID')->first();
        $international = Requirement::where('name', '(Passport if international)')->first();
        $sketch = Requirement::where('name', 'Sketch, Information case')->first();
        $homeownerCert = Requirement::where('name', "Homeowner's certfication")->first();
        $leasing = Requirement::where('name', 'Leasing contract if renting')->first();
        $dti = Requirement::where('name', 'DTI (if sari-sari store kahit wala na DTI)')->first();
        $renewal = Requirement::where('name', 'if renewal: Old Brgy. Business Clearance')->first();
        $premises = Requirement::where('name', '(if sa premises ng Subd. or Sitios and business Address)')->first();
        $sec = Requirement::where('name', 'SEC Certificate with complete attachment of Articles of Incorporation')->first();
        $representative = Requirement::where('name', 'If representatives only: Authorization letter with valid ID of owner and representative')->first();
        $transferCert = Requirement::where('name', 'Transfer certificate of title')->first();
        $tax = Requirement::where('name', 'Tax Declaration')->first();
        $developmentPlan = Requirement::where('name', 'Site Development Plan (Blueprint with complete attachment) or kahit sketch nung irerenovate na property at picture nung parte ng building na irerenovate')->first();
        $validId2 = Requirement::where('name', 'Valid ID (at least 2)')->first();
        //dd($validId);

        // format purposes in array sets
        $setA = DB::table('purposes')->select('id')->whereIn('name', 
            [
                'Local employment', 'National ID', 'Police Clearance',
                'Postal ID', 'Passport', 'NBI Clearance', 'TESDA', 
                'PRC Board Exam', 'PVAO (Senior)', 'Scholarship', 
                'Money transfer', 'Others: Avon, Personal Collection',
            ])->get()->values()->toArray();
        
        foreach ($setA as $key => $id) {
            array_push($ids, $id->id);
        }

        $cedula->purposes()->attach($ids);
        $ids = [];
        ////////////////////////////////////////////////////////////////
        $setB = DB::table('purposes')->select('id')->whereIn('name',
            [
                'For Traveling: Abroad and Local',
            ])->get()->values()->toArray();

        foreach ($setB as $key => $id) {
            array_push($ids, $id->id);
        }

        $cedula->purposes()->attach($ids);
        $validId->purposes()->attach($ids);
        $international->purposes()->attach($ids);
        $ids = [];
        ////////////////////////////////////////////////////////////////
        $setC = DB::table('purposes')->select('id')->whereIn('name',
            [
                'For Legal: Probation and Bond',
            ])->get()->values()->toArray();

        foreach ($setC as $key => $id) {
            array_push($ids, $id->id);
        }

        $cedula->purposes()->attach($ids);
        $validId->purposes()->attach($ids);
        $sketch->purposes()->attach($ids);
        $ids = [];
        ////////////////////////////////////////////////////////////////
        $setD = DB::table('purposes')->select('id')->whereIn('name',
            [
                'Loan Requirement Purposes',
                'Bank Requirement Purposes',
            ])->get()->values()->toArray();

        foreach ($setD as $key => $id) {
            array_push($ids, $id->id);
        }

        $cedula->purposes()->attach($ids);
        $validId->purposes()->attach($ids);
        $homeownerCert->purposes()->attach($ids);
        $ids = [];
        ////////////////////////////////////////////////////////////////
        $setE = DB::table('purposes')->select('id')->whereIn('name',
            [
                'Meralco and Manila Water',
            ])->get()->values()->toArray();

        foreach ($setE as $key => $id) {
            array_push($ids, $id->id);
        }

        $cedula->purposes()->attach($ids);
        $validId->purposes()->attach($ids);
        $homeownerCert->purposes()->attach($ids);
        $ids = [];
        ////////////////////////////////////////////////////////////////
        $setF = DB::table('purposes')->select('id')->whereIn('name',
            [
                'Single / Sole Proprietorship',
            ])->get()->values()->toArray();

        foreach ($setF as $key => $id) {
            array_push($ids, $id->id);
        }

        $cedula->purposes()->attach($ids);
        $validId->purposes()->attach($ids);
        $leasing->purposes()->attach($ids);
        $dti->purposes()->attach($ids);
        $renewal->purposes()->attach($ids);
        $ids = [];
        ////////////////////////////////////////////////////////////////
        $setG = DB::table('purposes')->select('id')->whereIn('name',
            [
                'Corporation / Incorporation',
            ])->get()->values()->toArray();

        foreach ($setG as $key => $id) {
            array_push($ids, $id->id);
        }

        $cedula->purposes()->attach($ids);
        $validId->purposes()->attach($ids);
        $leasing->purposes()->attach($ids);
        $sec->purposes()->attach($ids);
        $representative->purposes()->attach($ids);
        $renewal->purposes()->attach($ids);
        $ids = [];
        ////////////////////////////////////////////////////////////////
        $setH = DB::table('purposes')->select('id')->whereIn('name',
            [
                'Renovation / Repair',
            ])->get()->values()->toArray();

        foreach ($setH as $key => $id) {
            array_push($ids, $id->id);
        }

        $cedula->purposes()->attach($ids);
        $validId->purposes()->attach($ids);
        $transferCert->purposes()->attach($ids);
        $tax->purposes()->attach($ids);
        $developmentPlan->purposes()->attach($ids);
        $ids = [];
        ////////////////////////////////////////////////////////////////
        $setI = DB::table('purposes')->select('id')->whereIn('name',
            [
                'New Building for Construction',
            ])->get()->values()->toArray();

        foreach ($setI as $key => $id) {
            array_push($ids, $id->id);
        }

        $cedula->purposes()->attach($ids);
        $validId2->purposes()->attach($ids);
        $transferCert->purposes()->attach($ids);
        $tax->purposes()->attach($ids);
        $developmentPlan->purposes()->attach($ids);
        $homeownerCert->purposes()->attach($ids);
        $ids = [];
        ////////////////////////////////////////////////////////////////
        // merge all array into a an array | format: [ [$setA], [$setB] ] array of arrays
        //array_push($setCollection, $setA, $setB, $setC, $setD, $setE, $setF, $setG, $setH, $setI);

        /*foreach ($setCollection as $key => $set) {
            dd($key, $set);
            foreach ($set as $key => $purpose) {
                
            }
        }*/
        //
    }
}
