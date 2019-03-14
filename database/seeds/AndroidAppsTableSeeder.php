<?php

use Illuminate\Database\Seeder;
use App\AndroidApp;
use App\Category;

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
        $apps = factory(AndroidApp::class, 2)->create();
        factory(AndroidApp::class, 2)->states('premium')->create();

        // Assign some apps to categories
        foreach ($apps as $app) {
            $app->categories()->attach(Category::first());
        }
    }
}
