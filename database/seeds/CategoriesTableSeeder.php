<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('categories')->insert([

      ['name' => "Education"],
      ['name' => "Business"],
      ['name' => "Dating"],
      ['name' => "Entertainment"],
      ['name' => "Food"],
      ['name' => "News"],
      ['name' => "Productivity"],
      ['name' => "Shopping"],
      ['name' => "Social"],
      ['name' => "Weather"]
    ]);
  }
}
