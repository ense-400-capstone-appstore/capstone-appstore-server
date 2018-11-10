<?php

namespace App\Console\Commands\App;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class AppInstall extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the application for local development';

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
     * @return mixed
     */
    public function handle()
    {
        // Create database.sqlite file
        // This is the default local development database
        fclose(fopen(database_path() . '/database.sqlite', 'w'));

        // Run all migrations
        Artisan::call('migrate');

        // Seed database with Voyager seed files
        Artisan::call('db:seed', ['--class' => 'VoyagerDatabaseSeeder']);

        // Seed database with this application's seed files
        Artisan::call('db:seed');

        // Create symbolic link to storage path
        Artisan::call('storage:link');

        // Install NPM dependencies
        exec('npm install');

        // Compile Node assets for development
        exec('npm run dev');

        // TODO: Copy .env.development to .env, replace DB_DATABASE path

        echo "Please check above if there were any errors.";
        echo "If there were not errors, the application is ready for local development!\n";
        echo "\n";
        echo "Administrator credentials:";
        echo "Email:    admin@admin.com\n";
        echo "Password: password\n";
    }
}
