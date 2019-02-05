<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RefineSchemaAdditions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('group_android_app', function (Blueprint $table) {
            $table->unsignedInteger('group_id');
            $table->foreign('group_id')->references('id')->on('groups');

            $table->unsignedInteger('android_app_id');
            $table->foreign('android_app_id')->references('id')->on('android_apps');

            $table->primary(['group_id', 'android_app_id']);

            $table->timestamps();
        });

        Schema::create('category_android_app', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->unsignedInteger('android_app_id');
            $table->foreign('android_app_id')->references('id')->on('android_apps');

            $table->primary(['category_id', 'android_app_id']);

            $table->timestamps();
        });

        Schema::create('user_group', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('group_id');
            $table->foreign('group_id')->references('id')->on('groups');

            $table->primary(['user_id', 'group_id']);

            $table->timestamps();
        });

        Schema::create('permission_android_app', function (Blueprint $table) {
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedInteger('group_id');
            $table->foreign('group_id')->references('id')->on('groups');

            $table->primary(['user_id', 'group_id']);

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
        Schema::dropIfExists('group_android_app');
        Schema::dropIfExists('category_android_app');
        Schema::dropIfExists('user_group');
        Schema::dropIfExists('permission_android_app');
    }
}
