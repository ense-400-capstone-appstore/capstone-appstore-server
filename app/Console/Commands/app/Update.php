<?php

namespace App\Console\Commands\app;

use App;
use Illuminate\Console\Command;

class Update extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update
                            {--r|release= : Specifies release to update to (e.g., 1.0.0)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update application code and dependencies.';

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
        $this->flagProduction = App::environment() == 'production';
        $this->release = $this->option('release');

        // Run update steps
        $this->pullCodeChanges();
        $this->installComposerDependencies();
        $this->installNPMDependencies();

        $this->showSuccessMessage();
    }

    /**
     * Pull newest commit on this branch from GitHub.
     */
    protected function pullCodeChanges()
    {
        if (!$this->release) return;

        echo "Attempting to update to version {$this->release} ...\n";
        exec('git reset --hard');
        exec('git fetch');
        exec("git checkout {$this->release}");
    }

    /**
     * Handle installation of Composer back-end dependencies.
     */
    protected function installComposerDependencies()
    {
        echo "Installing back-end dependencies ...\n";

        if ($this->flagProduction) {
            exec('composer install --optimize-autoloader --no-dev');
        } else {
            exec('composer install');
        }
    }

    /**
     * Handle installation of NPM front-end dependencies and code compilation.
     */
    protected function installNPMDependencies()
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
     * Show information to the user after the application updates successfully.
     */
    protected function showSuccessMessage()
    {
        echo "\n";
        echo "Please check above if there were any errors.\n";
        echo "If there were no errors, dependencies have been\n";
        echo "updated successfully!\n";
        echo "\n";
        echo "Next, run `php artisan app:install` to complete the\n";
        echo "installation process.";
    }
}
