<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RefineSchema extends Migration
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

        Schema::dropIfExists('permission_roles');
        Schema::dropIfExists('android_app_permissions');

        Schema::create('category_android_app', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->unsignedInteger('android_app_id');
            $table->foreign('android_app_id')->references('id')->on('android_apps');

            $table->primary(['category_id', 'android_app_id']);

            $table->timestamps();
        });

        Schema::create('category_group', function (Blueprint $table) {
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');

            $table->unsignedInteger('group_id');
            $table->foreign('group_id')->references('id')->on('groups');

            $table->primary(['category_id', 'group_id']);

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

        Schema::dropIfExists('category_android_app');
        Schema::dropIfExists('category_group');
        Schema::dropIfExists('user_group');
        Schema::dropIfExists('permission_android_app');
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
