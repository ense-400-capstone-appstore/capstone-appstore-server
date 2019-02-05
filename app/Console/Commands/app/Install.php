<?php

namespace App\Console\Commands\App;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:install
                            {--c|clean-install : Drops and rebuilds the database}
                            {--p|production : Also runs commands specific to production deployments}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install or update the application for development or production.';

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
        // Set flags for every option that was passed as input
        $flagProduction = $this->option('production');
        $flagCleanInstall = $this->option('clean-install');
        $flagNoInteraction = $this->option('no-interaction');

        if ($flagCleanInstall && !$flagNoInteraction) {
            $confirm = $this->confirm('CAUTION! This will delete ALL application data. Continue?');

            if (!$confirm) return;
        }

        if ($flagProduction) {
            echo "Updating application code from GitHub ...\n";
            exec('git reset --hard');
            exec('git pull');
        }

        if ($flagCleanInstall) {
            echo "Generating application key ...\n";
            $this->call('key:generate');

            echo "Dropping database if it exists ...\n";
        }

        echo "Running migrations ...\n";
        if ($flagCleanInstall) {
            $this->call('migrate:fresh');
        } elseif ($flagProduction) {
            $this->call('migrate', ['--force' => true]);
        } else {
            $this->call('migrate');
        }

        echo "Seeding database ...\n";
        $this->call('db:seed');

        if ($flagCleanInstall) {
            echo "Linking storage ...\n";
            $this->call('storage:link');

            echo "Generating Passport keys ...\n";
            $this->call('passport:install');
            $this->call('passport:keys');
        }

        echo "Installing front-end dependencies ...\n";
        exec('npm install --no-progress');

        if ($flagProduction) {
            echo "Compiling optimized production front-end code ...\n";
            exec('npm run prod');
        } else {
            echo "Compiling front-end code ...\n";
            exec('npm run dev');
        }

        echo "\n";
        echo "Please check above if there were any errors.\n";
        echo "If there were no errors, the application is ready!\n";
        echo "\n";
        echo "Administrator credentials:\n";
        echo "Email:    admin@matryoshkadoll.me\n";
        echo "Password: password\n";
    }
}
