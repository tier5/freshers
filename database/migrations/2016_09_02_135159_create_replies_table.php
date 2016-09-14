<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replies', function (Blueprint $table) {
            $table->increments('id')->unsigned()->index();
            $table->timestamps();
            $table->text('reply_body');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('comment_id')->unsigned()->index();
            $table->integer('likes')->unsigned()->index();
            $table->integer('shares')->unsigned()->index();

        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropForeign(['user_id','comment_id']);
        Schema::drop('replies');
    }

}

