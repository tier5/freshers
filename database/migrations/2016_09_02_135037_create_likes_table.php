<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->increments('id')->unsigned()->index();
            $table->timestamps();
            $table->integer('count')->unsigned()->nullable()->index();
            $table->integer('comment_id')->unsigned()->index()->nullable();
            $table->integer('reply_id')->unsigned()->index()->nullable();
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->integer('article_id')->unsigned()->index()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropForeign(['user_id','comment_id','article_id','reply_id']);
        Schema::drop('likes');
    }
}
