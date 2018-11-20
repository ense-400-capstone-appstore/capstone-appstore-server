<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAndroidAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('android_apps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('version');
            $table->string('description');
            $table->double('price');
            $table->string('avatar');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('android_apps');
    }
}
