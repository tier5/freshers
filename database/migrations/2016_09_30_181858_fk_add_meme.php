<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FkAddMeme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('likes' , function (Blueprint $table){
            $table->integer('meme_id')->unsigned()->index()->nullable();
        });
        Schema::table('dislikes' , function (Blueprint $table){
            $table->integer('meme_id')->unsigned()->index()->nullable();
        });
        Schema::table('views' , function (Blueprint $table){
            $table->integer('meme_id')->unsigned()->index()->nullable();
        });
        Schema::table('comments' ,  function (Blueprint $table){
            $table->integer('meme_id')->unsigned()->index()->nullable();
        });

        Schema::table('likes' , function (Blueprint $table){
            $table->foreign('meme_id')->references('id')->on('meme')->onDelete('cascade');
        });
         Schema::table('dislikes' , function (Blueprint $table){
             $table->foreign('meme_id')->references('id')->on('meme')->onDelete('cascade');
         });
         Schema::table('views' , function (Blueprint $table){
             $table->foreign('meme_id')->references('id')->on('meme')->onDelete('cascade');
         });
         Schema::table('comments' , function (Blueprint $table){
             $table->foreign('meme_id')->references('id')->on('meme')->onDelete('cascade');
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
