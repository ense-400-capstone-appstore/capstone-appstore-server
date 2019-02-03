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
            // Voyager seeders
            DataTypesTableSeeder::class,
            DataRowsTableSeeder::class,
            MenusTableSeeder::class,
            MenuItemsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionsTableSeeder::class,
            PermissionRoleTableSeeder::class,
            SettingsTableSeeder::class,

            // Application seeders
            UsersTableSeeder::class,
            AndroidAppsTableSeeder::class,
            CategoriesTableSeeder::class,
            // ReviewsTableSeeder::class,
            // RepliesTableSeeder::class,
        ]);
    }
}
