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
        echo "Generating application key ...";
        Artisan::call('key:generate');

        echo "Running migrations ...";
        Artisan::call('migrate');

        echo "Seeding database 1/2 ...";
        Artisan::call('db:seed', ['--class' => 'VoyagerDatabaseSeeder']);

        echo "Seeding database 2/2 ...";
        Artisan::call('db:seed');

        echo "Linking storage ...";
        Artisan::call('storage:link');

        echo "Generating Passport keys ...";
        Artisan::call('passport:install');

        echo "Compiling front-end code ...";
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
