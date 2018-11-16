<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('review')->insert([

      [
        'user_id' => 1,
        'android_app_id' => 1,
        'message' => "this is review 1",
        'rating' => 2.33,
        'version' => "1.0",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],
      [
        'user_id' => 1,
        'android_app_id' => 2,
        'message' => "this is review 2",
        'rating' => 3.22,
        'version' => "1.0",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]
    ]);
    }
}
