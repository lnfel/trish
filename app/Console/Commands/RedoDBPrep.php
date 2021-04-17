<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Artisan;

class RedoDBPrep extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:rezero';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs db:wipe, migrate and db:seed commands.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $commands = [
            'db:wipe', 'migrate', 'db:seed', 'passport:install', 'cache:clear', 'config:clear', 'config:cache',
        ];

        $bar = $this->output->createProgressBar(count($commands));
        $this->line('');
        $this->info('Re-building database from the ground up.');
        $bar->start();

        foreach ($commands as $command) {
            //dd($command);
            $this->line('');
            $this->info('Running '.$command);
            Artisan::call($command);
            $bar->advance();
        }

        $this->line('');
        $this->info('Database re-build finished.');
        $bar->finish();
        /*Artisan::call('db:wipe');
        Artisan::call('migrate');
        Artisan::call('db:seed');*/
    }
}
