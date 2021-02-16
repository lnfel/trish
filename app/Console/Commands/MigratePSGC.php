<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigratePSGC extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:psgc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Runs migration for Philippine Standard Geographic Code tables';

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
        $psgcPath = 'prpcmblmts/';

        $migrations = [
            $psgcPath.'1995_10_23_100000_create_philippine_regions_table.php',
            $psgcPath.'1995_10_23_200000_create_philippine_provinces_table.php',
            $psgcPath.'1995_10_23_300000_create_philippine_cities_table.php',
            $psgcPath.'1995_10_23_400000_create_philippine_barangays_table.php'
        ];

        // create progress bar
        $bar = $this->output->createProgressBar(count($migrations));
        $bar->start();
        $this->line('');

        // call migrate for each specified migration
        foreach ($migrations as $migration) {
            $basePath = '/database/migrations/';
            $migrationName = trim($migration);
            $path = $basePath.$migrationName;

            $this->call('migrate', [
                '--path' => $path,
                '--force' => true,
            ]);
            $bar->advance();
            $this->line('');
        }

        $bar->finish();
    }
}
