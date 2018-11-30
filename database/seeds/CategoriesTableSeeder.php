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
    function CheckCatoryExist($name)
    {
      $category = Category::firstOrNew(['name' => $name]);
      return $category;
    }

    $categorylist[0] = "Education";
    $categorylist[1] = "Business";
    $categorylist[2] = "Dating";
    $categorylist[3] = "Entertainment";
    $categorylist[4] = "Food";
    $categorylist[5] = "News";
    $categorylist[6] = "Productivity";
    $categorylist[7] = "Shopping";
    $categorylist[8] = "Social";
    $categorylist[9] = "Weather";

    for ($index = 0; $index < count($categorylist); $index++) {
      $obj = CheckCatoryExist($categorylist[$index]);
      if (!$obj->exists) {
        $category = new Category;
        $category->name = $categorylist[$index];
        $category->save();
      }
    }
  }
}
