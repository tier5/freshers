<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDislikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('dislikes', function (Blueprint $table) {
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
        //
        Schema::drop('dislikes');
    }
}
