<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixUserAndroidAppKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('user_android_app');

        Schema::create('user_android_app', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign("user_id")->references('id')->on('users');

            $table->unsignedInteger('android_app_id');
            $table->foreign("android_app_id")->references('id')->on('android_apps');

            $table->primary(['user_id', 'android_app_id']);

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
        Schema::dropIfExists('user_android_app');

        Schema::create('user_android_app', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('android_app_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('android_app_id')->references('id')->on('android_apps');
            $table->unique(['user_id', 'android_app_id']);
            $table->timestamps();
        });
    }
}
