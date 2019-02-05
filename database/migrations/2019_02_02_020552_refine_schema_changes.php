<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RefineSchemaChanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('android_apps', function (Blueprint $table) {
            $table->text('description')->change();
            $table->float('price')->default(0.0)->change();
            $table->string('file')->nullable();
            $table->string('avatar')->default('android-apps/default.png')->change();
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->text('message')->change();
        });

        Schema::table('replies', function (Blueprint $table) {
            $table->text('message')->change();
        });

        Schema::rename('android_app_purchases', 'user_android_app');

        Schema::table('user_android_app', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('permission_role', function (Blueprint $table) {
            $table->timestamps();
        });

        Schema::table('user_roles', function (Blueprint $table) {
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
        Schema::table('android_apps', function (Blueprint $table) {
            $table->string('description')->change();
            $table->string('price')->change();
            $table->dropColumn('file');
            $table->string('avatar')->default(null)->change();
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->text('message')->change();
        });

        Schema::table('replies', function (Blueprint $table) {
            $table->string('message')->change();
        });

        Schema::rename('user_android_app', 'android_app_purchases');

        Schema::table('android_app_purchases', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('permission_role', function (Blueprint $table) {
            $table->dropTimestamps();
        });

        Schema::table('user_roles', function (Blueprint $table) {
            $table->dropTimestamps();
        });
    }
}
