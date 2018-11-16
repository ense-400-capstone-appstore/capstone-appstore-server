<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class CategroyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('category')->insert([

        [
        'name' => "Education",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],
      [
        'name' => "Business",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s')

      ],
      [
        'name' => "Dating",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s')

      ],
      [
        'name' => "Entertainment",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s')

      ],
      [
        'name' => "Food",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s')

      ],
      [
        'name' => "News",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s')

      ],
      [
        'name' => "Productivity",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s')

      ],
      [
        'name' => "Shopping",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s')

      ],
      [
        'name' => "Social",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s')

      ],
      [
        'name' => "Weather",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s')

      ]

        ]);
    }
}
