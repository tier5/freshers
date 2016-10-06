
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id')->unsigned()->index();
            $table->timestamps();
            $table->text('comment_body');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('article_id')->unsigned()->index()->nullable();
            $table->integer('likes')->unsigned()->index();
            $table->integer('shares')->unsigned()->index();
            $table->boolean('approved');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropForeign(['user_id','article_id']);
        Schema::drop('comments');
    }
}
