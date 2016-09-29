<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemeLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meme_likes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('like');
            $table->integer('meme_id')->unsigned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->timestamps();

            $table->foreign('meme_id')
                ->references('id')->on('meme')
                ->ondelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('meme_likes');
    }
}
