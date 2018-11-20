<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\AndroidApp;
class AndroidAppsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */


  public function run()
  {
     function CheckAppExist($name){
       $androidApp= AndroidApp::firstOrNew(['name' => $name]);
       return $androidApp;
     }
     $obj=CheckAppExist("App 1");
     $obj2=CheckAppExist("App 2");
      if (!$obj->exists)
    {
      $androidApp = new AndroidApp;
      $androidApp->name = 'App 1';
      $androidApp->version = '1.0';
      $androidApp->description = 'Placeholder application 1';
      $androidApp->price = 0.00;
      $androidApp->avatar = 'empty';
      $androidApp->save();

    }
    if (!$obj2->exists) {
      $androidApp = new AndroidApp;
      $androidApp->name = 'App 2';
      $androidApp->version = '1.0';
      $androidApp->description = 'Placeholder application 2';
      $androidApp->price = 0.00;
      $androidApp->avatar = 'empty';
      $androidApp->save();
    }
  }

}
