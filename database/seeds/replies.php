<?php

use Illuminate\Database\Seeder;
use App\Reply;
class replies extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$rep = new Reply();
    	$rep->reply_body = '1st reply on 1st comment on barca post';
    	$rep->user_id = 1;
    	$rep->comment_id = 2;
    	$rep->likes = 0;
    	$rep->shares= 0;
    	$rep->save();

    	$rep = new Reply();
    	$rep->reply_body = '2nd reply on 1st comment on barca post';
    	$rep->user_id = 2;
    	$rep->comment_id = 2;
    	$rep->likes = 0;
    	$rep->shares= 0;
    	$rep->save();

    	$rep = new Reply();
    	$rep->reply_body = '3rd reply on 1st comment on barca post';
    	$rep->user_id = 3;
    	$rep->comment_id = 2;
    	$rep->likes = 0;
    	$rep->shares= 0;
    	$rep->save();

    	$rep = new Reply();
    	$rep->reply_body = '1st reply on 2nd comment on barca post';
    	$rep->user_id = 1;
    	$rep->comment_id = 3;
    	$rep->likes = 0;
    	$rep->shares= 0;
    	$rep->save();

    	$rep = new Reply();
    	$rep->reply_body = '2nd reply on 2nd comment on barca post';
    	$rep->user_id = 2;
    	$rep->comment_id = 3;
    	$rep->likes = 0;
    	$rep->shares= 0;
    	$rep->save();

    	$rep = new Reply();
    	$rep->reply_body = '3rd reply on 2nd comment on barca post';
    	$rep->user_id = 3;
    	$rep->comment_id = 3;
    	$rep->likes = 0;
    	$rep->shares= 0;
    	$rep->save();

    	$rep = new Reply();
    	$rep->reply_body = '1st reply on 3rd comment on barca post';
    	$rep->user_id = 1;
    	$rep->comment_id = 4;
    	$rep->likes = 0;
    	$rep->shares= 0;
    	$rep->save();

    	$rep = new Reply();
    	$rep->reply_body = '2nd reply on 3rd comment on barca post';
    	$rep->user_id = 2;
    	$rep->comment_id = 4;
    	$rep->likes = 0;
    	$rep->shares= 0;
    	$rep->save();

    	$rep = new Reply();
    	$rep->reply_body = '3rd reply on 3rd comment on barca post';
    	$rep->user_id = 3;
    	$rep->comment_id = 4;
    	$rep->likes = 0;
    	$rep->shares= 0;
    	$rep->save();

    }
}
