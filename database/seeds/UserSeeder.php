<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//$this->line('');
    	//$this->info('Adding default user.');
        factory(App\User::class, 1)->create();
        /*$this->line('');
    	$this->info('Adding default admin.');*/
        factory(App\Admin::class, 1)->create();
    }
}
