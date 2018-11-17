<?php

namespace App\Console\Commands\App;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class AppBuild extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:build';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the application for production';

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
        // Generate application key
        Artisan::call('key:generate');

        // Run all migrations
        Artisan::call('migrate');

        // Seed database with Voyager seed files
        Artisan::call('db:seed', ['--class' => 'VoyagerDatabaseSeeder']);

        // Seed database with this application's seed files
        Artisan::call('db:seed');

        // Create symbolic link to storage path
        Artisan::call('storage:link');

        // Generate authentication keys
        Artisan::call('passport:install');

        // Install NPM dependencies
        exec('npm install');

        // Compile Node assets for development
        exec('npm run prod');

        echo "Please check above if there were any errors.";
        echo "Application is almost ready for production!\n";
        echo "Make sure your .env file is set up correctly. See .env.production\n";
        echo "for an example.\n";
        echo "\n";
        echo "Administrator credentials:\n";
        echo "Email:    admin@admin.com\n";
        echo "Password: password\n";
    }
}
