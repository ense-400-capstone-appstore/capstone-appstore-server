<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class Android_appsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('android_apps')->insert([

        'title' => str_random(8),
        'available' => true,
        

        ]);
    }
}
