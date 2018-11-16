<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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

        [
        'name' => "app1",
        'android_app_permission_id' => 1,
        'version' => "1.0",
        'description' => "my app1",
        //'title' => "title1",
        'price' => 0.00,
        'avatar' => "umpty",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],
      [
        'name' => "app2",
        'android_app_permission_id' => 1,
        'version' => "1.0",
        'description' => "my app2",
        //'title' => "title2",
        'price' => 0.00,
        'avatar' => "umpty",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s')

      ]

        ]);
    }
}
