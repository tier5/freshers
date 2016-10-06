<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemeArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meme_article', function (Blueprint $table) {
            $table->increments('id')->unsigned()->index();
            $table->integer('article_id')->unsigned()->index();
            $table->integer('meme_id')->unsigned()->index();
            $table->timestamps();

            /* Foreign key definitions */
            $table->foreign('meme_id')
                ->references('id')->on('meme')
                ->onDelete('cascade');
            $table->foreign('article_id')
                ->references('id')->on('articles')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('meme_article');
    }
}
