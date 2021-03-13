<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$requirements = [
    		[
        	"name" => "Cedula",
        ],

        [
        	"name" => "Valid ID",
        ],

        [
        	"name" => "(Passport if international)",
        ],

        [
        	"name" => "Sketch, Information case",
        ],

        [
        	"name" => "Homeowner's certfication",
        ],

        [
        	"name" => "Leasing contract if renting",
        ],

        [
        	"name" => "DTI (if sari-sari store kahit wala na DTI)",
        ],

        [
        	"name" => "if renewal: Old Brgy. Business Clearance",
        ],

        [
        	"name" => "(if sa premises ng Subd. or Sitios and business Address)",
        ],

        [
        	"name" => "SEC Certificate with complete attachment of Articles of Incorporation",
        ],

        [
        	"name" => "If representatives only: Authorization letter with valid ID of owner and representative",
        ],

        [
        	"name" => "Transfer certificate of title",
        ],

        [
        	"name" => "Tax Declaration",
        ],

        [
        	"name" => "Site Development Plan (Blueprint with complete attachment) or kahit sketch nung irerenovate na property at picture nung parte ng building na irerenovate",
        ],

        [
        	"name" => "Valid ID (at least 2)",
        ],
    	];

    	DB::table('requirements')->insert($requirements);
    }
}
