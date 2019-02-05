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
        $this->flagProduction = $this->option('production');
        $this->flagCleanInstall = $this->option('clean-install');
        $this->flagNoInteraction = $this->option('no-interaction');

        if (!$this->getConfirmation()) return;

        // Run installation steps
        $this->pullCodeChanges();
        $this->generateAppKey();
        $this->runMigrations();
        $this->seedDatabase();
        $this->linkStorage();
        $this->installPassport();
        $this->installFrontEnd();

        $this->showSuccessMessage();
    }

    /**
     * Show a warning prompt for users based on certain flags. If the users agree
     * to the prompt, return true, otherwise false.
     *
     * If no warning prompts are shown, return true.
     *
     * @return boolean user response
     */
    protected function getConfirmation()
    {
        if ($this->flagCleanInstall && !$this->flagNoInteraction) {
            return $this->confirm('CAUTION! This will delete ALL application data. Continue?');
        }

        return true;
    }

    /**
     * Pull newest commit on this branch from GitHub.
     */
    protected function pullCodeChanges()
    {
        if (!$this->flagProduction) return;

        echo "Updating application code from GitHub ...\n";
        exec('git reset --hard');
        exec('git pull');
    }

    /**
     * Generate application key for encryption.
     */
    protected function generateAppKey()
    {
        if (!$this->flagCleanInstall) return;

        echo "Generating application key ...\n";
        $this->call('key:generate');
    }

    /**
     * Run database migrations.
     */
    protected function runMigrations()
    {
        echo "Running migrations ...\n";
        if ($this->flagCleanInstall) {
            echo "Dropping database if it exists ...\n";
            $this->call('migrate:fresh');
        } elseif ($this->flagProduction) {
            $this->call('migrate', ['--force' => true]);
        } else {
            $this->call('migrate');
        }
    }

    /**
     * Run database seeders.
     */
    protected function seedDatabase()
    {
        echo "Seeding database ...\n";
        $this->call('db:seed');
    }

    /**
     * Link the public storage disk.
     */
    protected function linkStorage()
    {
        if (!$this->flagCleanInstall) return;

        echo "Linking storage ...\n";
        $this->call('storage:link');
    }

    /**
     * Install Passport for API authentication.
     */
    protected function installPassport()
    {
        if (!$this->flagCleanInstall) return;

        echo "Generating Passport keys ...\n";
        $this->call('passport:install');
        $this->call('passport:keys');
    }

    /**
     * Handle installation of NPM front-end code.
     */
    protected function installFrontEnd()
    {
        echo "Installing front-end dependencies ...\n";
        exec('npm install --no-progress');

        if ($this->flagProduction) {
            echo "Compiling optimized production front-end code ...\n";
            exec('npm run prod');
        } else {
            echo "Compiling front-end code ...\n";
            exec('npm run dev');
        }
    }

    /**
     * Show information to the user after the application installs successfully.
     */
    protected function showSuccessMessage()
    {
        echo "\n";
        echo "Please check above if there were any errors.\n";
        echo "If there were no errors, the application is ready!\n";
        echo "\n";
        echo "Administrator credentials:\n";
        echo "Email:    admin@matryoshkadoll.me\n";
        echo "Password: password\n";
    }
}
