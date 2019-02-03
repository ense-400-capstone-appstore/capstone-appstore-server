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
            if (DB::getDriverName() !== 'sqlite') $table->dropForeign('android_apps_android_app_permission_id_foreign');
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
        });
    }
}
