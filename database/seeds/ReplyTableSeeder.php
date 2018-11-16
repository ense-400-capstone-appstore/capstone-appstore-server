<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ReplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('reply')->insert([

      [
        'user_id' => 1,
        'review_id' => 1,
        //'message' => "this is reply 1",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ],
      [
        'user_id' => 1,
        'review_id' => 2,
        //'message' => "this is reply 2",
        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
      ]
    ]);
    }
}
