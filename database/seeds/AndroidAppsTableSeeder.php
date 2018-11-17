<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AndroidAppsTableSeeder extends Seeder
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
        'name' => "App 1",
        'version' => "1.0",
        'description' => "Placeholder application 1",
        'price' => 0.00,
        'avatar' => "empty",
      ],
      [
        'name' => "App 2",
        'version' => "1.0",
        'description' => "Placeholder application 2",
        'price' => 0.00,
        'avatar' => "empty",
      ]
    ]);
  }
}
