<?php

use Illuminate\Database\Seeder;
use App\Comment;
class comments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cmt = new Comment();
        $cmt->comment_body = '1st comment on barca article';
        $cmt->user_id = 1;
        $cmt->article_id=1;
        $cmt->likes = 0;
        $cmt->shares = 0;
        $cmt->approved = 1;
        $cmt->save();

        $cmt = new Comment();
        $cmt->comment_body = '2nd comment on barca article';
        $cmt->user_id = 2;
        $cmt->article_id=1;
        $cmt->likes = 0;
        $cmt->shares = 0;
        $cmt->approved = 1;
        $cmt->save();

        $cmt = new Comment();
        $cmt->comment_body = '3rd comment on barca article';
        $cmt->user_id = 3;
        $cmt->article_id=1;
        $cmt->likes = 0;
        $cmt->shares = 0;
        $cmt->approved = 1;
        $cmt->save();

        /*$cmt = new Comment();
        $cmt->comment_body = '1st comment on vr_gear article';
        $cmt->user_id = 1;
        $cmt->article_id=3;
        $cmt->likes = 0;
        $cmt->shares = 0;
        $cmt->approved = 1;
        $cmt->save();

        $cmt = new Comment();
        $cmt->comment_body = '2nd comment on vr_gear article';
        $cmt->user_id = 2;
        $cmt->article_id=3;
        $cmt->likes = 0;
        $cmt->shares = 0;
        $cmt->approved = 1;
        $cmt->save();

        $cmt = new Comment();
        $cmt->comment_body = '3rd comment on vr_gear article';
        $cmt->user_id = 2;
        $cmt->article_id=3;
        $cmt->likes = 0;
        $cmt->shares = 0;
        $cmt->approved = 1;
        $cmt->save();*/



    }
}
