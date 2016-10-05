<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserIdNullableMemetable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        //Schema::table('meme' , function (Blueprint $table) {
        $sql = 'ALTER TABLE `meme` CHANGE `user_id` `user_id` INT(10) UNSIGNED NULL';
        DB::statement($sql);

        //});
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
