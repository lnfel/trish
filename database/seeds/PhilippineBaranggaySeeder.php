<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhilippineBaranggaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*if(!DB::table('philippine_baranggays')->count()) {
            DB::unprepared(file_get_contents(__DIR__ . '/sql/philippine_barangays.sql'));
        }*/
        $database = config('database.connections.mysql.database');
        $user = config('database.connections.mysql.username');
        $password = config('database.connections.mysql.password');

        /*$this->command->info($database);
        $this->command->info($user);
        $this->command->info($password);*/

        // running command line import in php code
        exec('mysql -u '.$user.' -p '.$password.' '.$database.' < ./database/seeds/sql/philippine_barangays.sql');
    }
}
