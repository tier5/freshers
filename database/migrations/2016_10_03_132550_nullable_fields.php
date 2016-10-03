<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NullableFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('comments' , function (Blueprint $table) {
            $table->foreign('article_id')->unsigned()->index()->nullable()->change();
        });
       //DB::statement('ALTER TABLE `comments` ALTER COLUMN `article_id` INTEGER UNSIGNED INDEX NULL;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        //DB::statement('ALTER TABLE `comments` MODIFY `article_id` INTEGER UNSIGNED INDEX NOT NULL;');

    }
}
