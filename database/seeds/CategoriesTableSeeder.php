<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Only seed unless categories exist
        if (Category::count() > 0) return;

        $categories = [
            ['name' => 'Education'],
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
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name']
            ]);
        }
    }
}
