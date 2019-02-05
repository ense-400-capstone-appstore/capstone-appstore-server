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
        $this->createJunctionTable('category', 'android_app');
        $this->createJunctionTable('permission', 'android_app');
        $this->createJunctionTable('group', 'user');
        $this->createJunctionTable('group', 'android_app');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_android_app');
        Schema::dropIfExists('permission_android_app');
        Schema::dropIfExists('group_user');
        Schema::dropIfExists('group_android_app');
    }

    /**
     * Create a junction table between two other tables.
     *
     * @param string $singularTableOne Singular form of first table's name
     * @param string $singularTableTwo Singular form of second table's name
     */
    protected function createJunctionTable(string $singularTableOne, string $singularTableTwo)
    {
        Schema::create("{$singularTableOne}_{$singularTableTwo}", function (Blueprint $table) use ($singularTableOne, $singularTableTwo) {
            $table->unsignedInteger("{$singularTableOne}_id");
            $table->foreign("{$singularTableOne}_id")->references('id')->on(str_plural($singularTableOne));

            $table->unsignedInteger("{$singularTableTwo}_id");
            $table->foreign("{$singularTableTwo}_id")->references('id')->on(str_plural($singularTableTwo));

            $table->primary(["{$singularTableOne}_id", "{$singularTableTwo}_id"]);

            $table->timestamps();
        });
    }
}
