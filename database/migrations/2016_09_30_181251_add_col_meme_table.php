<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColMemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('meme', function (Blueprint $table) {
            $table->integer('likes')->unsigned()->index()->nullable();
            $table->integer('dislikes')->unsigned()->index()->nullable();
            $table->integer('views')->unsigned()->index()->nullable();
            $table->integer('shares')->unsigned()->index()->nullable();
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
