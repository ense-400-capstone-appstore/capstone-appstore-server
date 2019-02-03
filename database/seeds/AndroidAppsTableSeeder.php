<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\AndroidApp;

class AndroidAppsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        // Only seed in development
        if (!App::environment('local')) return;

        // Only seed unless AndroidApps already exist
        if (AndroidApp::count() > 0) return;

        // Create some free and premium AndroidApps
        factory(AndroidApp::class, 2)->create();
        factory(AndroidApp::class, 2)->states('premium')->create();
    }

}
