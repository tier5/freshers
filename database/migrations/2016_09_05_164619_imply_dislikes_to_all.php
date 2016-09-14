<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImplyDislikesToAll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('replies',function($table){
            $table->integer('dislikes')->unsigned()->index()->nullable();
        });
        Schema::table('comments',function($table){
            $table->integer('dislikes')->unsigned()->index()->nullable();
        });
        Schema::table('articles',function($table){
            $table->integer('dislikes')->unsigned()->index()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
