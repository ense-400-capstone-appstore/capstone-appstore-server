<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class DataRowsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $this->call([
            // Seeders in DataRowsSeeders directory
            AndroidAppsDataRowsTableSeeder::class,
            CategoriesDataRowsTableSeeder::class,
            MenusDataRowsTableSeeder::class,
            RolesDataRowsTableSeeder::class,
            UsersDataRowsTableSeeder::class,
        ]);
    }
}
