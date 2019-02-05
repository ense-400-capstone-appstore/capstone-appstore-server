<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RefineSchemaDeletions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('permission_roles');
        Schema::dropIfExists('android_app_permissions');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('permission_roles', function (Blueprint $table) {
            $table->unsignedInteger('permission_id');
            $table->unsignedInteger('role_id');
            $table->foreign('permission_id')->references('id')->on('permissions');
            $table->foreign('role_id')->references('id')->on('roles');
        });

        Schema::create('android_app_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('android_app_id');
            $table->foreign('android_app_id')->references('id')->on('android_apps');
            $table->boolean('available');
            $table->timestamps();
        });
    }
}
