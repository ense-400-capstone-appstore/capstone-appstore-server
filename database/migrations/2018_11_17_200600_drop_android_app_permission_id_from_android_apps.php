<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropAndroidAppPermissionIdFromAndroidApps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('android_apps', function (Blueprint $table) {
            $table->dropColumn('android_app_permission_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('android_apps', function (Blueprint $table) {
            $table->unsignedInteger('android_app_permission_id');
            $table->foreign('android_app_permission_id')->references('id')->on('permissions');
        });
    }
}
