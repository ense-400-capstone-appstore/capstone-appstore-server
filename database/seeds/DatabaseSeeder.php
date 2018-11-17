<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AndroidAppsTableSeeder::class,
            CategoriesTableSeeder::class,
            ReviewsTableSeeder::class,
            RepliesTableSeeder::class,
        ]);
    }
}
