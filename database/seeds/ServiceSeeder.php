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
        	[
                'name' => 'Baranggay Clearance',
                'description' => 'A clearance being secured by an individual for the purpose to which he or she intends use to it.',
            ],
        	[
                'name' => 'Business Clearance',
                'description' => 'A clearance valid until the end of the calendar year issue and shall be renewed in January of the following year.',
            ],
        	[
                'name' => 'Baranggay (Building) Permit',
                'description' => 'A permit clearance being secured for the porpuse of building and constructing a certain temporary or permanent structure within the jurisdiction of this Barangay.',
            ],
            [
                'name' => 'Baranggay (Fencing) Permit',
                'description' => 'A permit of a Clearance being secured for the purposes of putting up perimeter fence over certain properties within the jurisdiction of this Baranggay.',
            ],
            [
                'name' => 'Baranggay (cutting of trees) Permit',
                'description' => 'A permit or clearance being secured for the purpose of cutting tree/s for justifiable reason/s.',
            ],
            [
                'name' => 'Baranggay (Development) Permit',
                'description' => 'A permit or clearance being secured for the purpose of ground or earth moving using heavy equipment for development purposes.',
            ],
            [
                'name' => 'Baranggay (Outdoor Sign) Permit',
                'description' => 'A permit or clearance being secured for the purpose of putting display signs, signboards, streamers, advertisment or poster signs of whatever materials.',
            ],
            [
                'name' => 'Baranggay (Terminal) Permit',
                'description' => 'A permit or clearance being secured for purposes of putting up terminals for public transport within the jurisdiction of this Baranggay.',
            ],
            [
                'name' => 'Baranggay (Transport Registration) Permit',
                'description' => 'A permit or clearance being secured for purposes of annual registration and/or franchise from the owner or operators of the following transport vehicle within this Baranggay.',
            ],
            [
                'name' => 'Baranggay (Organization Registration) Permit',
                'description' => 'A permit or clearance being secured for purposes of purposes of annual of religious, civic, social, non-government and sports org, this Barangay not contrary to laws, rules and regulation.',
            ],
            [
                'name' => 'Baranggay (Survey) Permit',
                'description' => 'A permit or clearance being secured for purposes of conducting surveys for educational or for legal purposes within the jurisdiction of this Baranggay.',
            ],
            [
                'name' => 'Baranggay (Transport of fighting Cocks) Permit',
                'description' => 'A permit or clearance being secured for purposes of transportating or traveling along with fighting cock/s. Clearance valid for 3 days.',
            ],
            [
                'name' => 'Baranggay (parade) Permit',
                'description' => 'A permit or clearance on every circus, menagerie parade or others parade using banners, floats, or musical instruments held within the baranggay.',
            ],
            [
                'name' => 'Baranggay (Benefit Ball) Permit',
                'description' => 'A permit or clearance on any person who shall conduct, manage or promote any benefit ball, dance, game or activity.',
            ],
            [
                'name' => 'Barangay (Lupon Tagapamayapa) Clearance',
                'description' => 'A clearance being secured for police, NBI or Court Clearance or legal purposes. Valid for 1 month.',
            ],
            [
                'name' => 'Baranggay (Manila Water Service) Connection Clearance',
                'description' => 'A Clearance being secured for purposed of applying or availing water service connection from Manila Water Company.',
            ],
            [
                'name' => 'Katarungang Pambaranggay Filling Fee',
                'description' => 'For filling any complaint with the lupon Tagapamayapa shall be collected from the complainant/s.',
            ],
            [
                'name' => "Baranggay Clearance for security Business/Mayor's Permit",
                'description' => 'The fee imposed herein shall be paid to the Brangay Treasurer or to duty authorized representative upon application or before any business or undertaking can be lawfully.',
            ],
        ];

        DB::table('services')->insert($services);
    }
}
