<?php

namespace App\Http\Controllers;

use App\Dislike;
use App\Like;
use App\Share;
use App\View;
use App\Reply;
use App\Article;
use App\User;
use App\Comment;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session; 
use \Response;

class ModalController extends Controller
{
    //
    public function like_article(Request $request)
    {
    	$list_ppl =array();
    	$msg = 'people who liked..!!';
    	$people_liked_article = Article::where('id',$request->id)->first()->like;
    	
    	if($people_liked_article->first() == null)
		{
              return Response::json(array(
			            'status' => false,
			            'message' => "no one liked..!!"        
			    	));
		}
        else
        {
        	$x=0;
        	foreach($people_liked_article as $each_people)
            {

            	if($each_people->user != null)
            	{
            		$x++;
            		$profile_pic_name = $each_people->user->profile_picture;  
	            	$person_f_name= $each_people->user->first_name; 
	            	$person_l_name= $each_people->user->last_name;
	            	$person_name = $person_f_name.$person_l_name;
	            	$list_ppl = array($x => array('profile_pic_name'=>$profile_pic_name,
	            						  'person_name' =>$person_name));
            	}
	            
            }
            return Response::json(array(
			            'status' => true,
			            'response' => $people_liked_article        
			    	));
        }
    }
     public function dislike_article(Request $request)
    {
    	$list_ppl =array();
    	$msg = 'people who disliked..!!';
    	$people_disliked_article = Article::where('id',$request->id)->first()->dislike;
    	
    	if($people_disliked_article->first() == null)
		{
              return Response::json(array(
			            'status' => false,
			            'message' => "no one disliked..!!"    
			    	));
		}
        else
        {
        	$x=0;
        	foreach($people_disliked_article as $each_people)
            {

            	if($each_people->user != null)
            	{
            		$x++;
            		$profile_pic_name = $each_people->user->profile_picture;  
	            	$person_f_name= $each_people->user->first_name; 
	            	$person_l_name= $each_people->user->last_name;
	            	$person_name = $person_f_name.$person_l_name;
	            	$list_ppl = array($x => array('profile_pic_name'=>$profile_pic_name,
	            						  'person_name' =>$person_name));
            	}
	            
            }
            return Response::json(array(
			            'status' => true,
			            'response' =>   $people_disliked_article,
			                
			    	));
        }
    }
     public function view_article(Request $request)
    {
    	$list_ppl =array();
    	$msg = 'people who viewed..!!';
    	$people_viewed_article = Article::where('id',$request->id)->first()->view;
    	
    	if($people_viewed_article->first() == null)
		{
              return Response::json(array(
			            'status' => false,
			            'message' => "no one viewed..!!"        
			    	));
		}
        else
        {
        	$x=0;
        	foreach($people_viewed_article as $each_people)
            {

            	if($each_people->user != null)
            	{
            		$x++;
            		$profile_pic_name = $each_people->user->profile_picture;  
	            	$person_f_name= $each_people->user->first_name; 
	            	$person_l_name= $each_people->user->last_name;
	            	$person_name = $person_f_name.$person_l_name;
	            	$list_ppl = array($x => array('profile_pic_name'=>$profile_pic_name,
	            						  'person_name' =>$person_name));
            	}
	            
            }
            //$y = View::where('article_id',$request->id)->where('user_id',$request->user_id)->first()->count;
            return Response::json(array(
			            'status' => true,
			            'response' => $people_viewed_article
			    	));
        }
    }

    public function like_comment(Request $request)
    {
    	$list_ppl =array();
    	$msg = 'people who liked comment..!!';
    	$people_liked_comment = Comment::where('id',$request->id)->first()->like;
    	
    	if($people_liked_comment->first() == null)
		{
              return Response::json(array(
			            'status' => false,
			            'message' => "no one liked comment..!!"        
			    	));
		}
        else
        {
        	$x=0;
        	foreach($people_liked_comment as $each_people)
            {

            	if($each_people->user != null)
            	{
            		$x++;
            		$profile_pic_name = $each_people->user->profile_picture;  
	            	$person_f_name= $each_people->user->first_name; 
	            	$person_l_name= $each_people->user->last_name;
	            	$person_name = $person_f_name.$person_l_name;
	            	$list_ppl = array($x => array('profile_pic_name'=>$profile_pic_name,
	            						  'person_name' =>$person_name));
            	}
	            
            }
            return Response::json(array(
			            'status' => true,
			            'response' => $people_liked_comment        
			    	));
        }
    }

    public function dislike_comment(Request $request)
    {
    	$list_ppl =array();
    	$msg = 'people who disliked comment..!!';
    	$people_disliked_comment = Comment::where('id',$request->id)->first()->dislike;
    	
    	if($people_disliked_comment->first() == null)
		{
              return Response::json(array(
			            'status' => false,
			            'message' => "no one disliked comment..!!"        
			    	));
		}
        else
        {
        	$x=0;
        	foreach($people_disliked_comment as $each_people)
            {

            	if($each_people->user != null)
            	{
            		$x++;
            		$profile_pic_name = $each_people->user->profile_picture;  
	            	$person_f_name= $each_people->user->first_name; 
	            	$person_l_name= $each_people->user->last_name;
	            	$person_name = $person_f_name.$person_l_name;
	            	$list_ppl = array($x => array('profile_pic_name'=>$profile_pic_name,
	            						  'person_name' =>$person_name));
            	}
	            
            }
            return Response::json(array(
			            'status' => true,
			            'response' => $people_disliked_comment        
			    	));
        }
    }

    public function like_reply(Request $request)
    {
    	$list_ppl =array();
    	$msg = 'people who liked reply..!!';
    	$people_liked_reply = Reply::where('id',$request->id)->first()->like;
    	
    	if($people_liked_reply->first() == null)
		{
              return Response::json(array(
			            'status' => false,
			            'message' => "no one liked reply..!!"        
			    	));
		}
        else
        {
        	$x=0;
        	foreach($people_liked_reply as $each_people)
            {

            	if($each_people->user != null)
            	{
            		$x++;
            		$profile_pic_name = $each_people->user->profile_picture;  
	            	$person_f_name= $each_people->user->first_name; 
	            	$person_l_name= $each_people->user->last_name;
	            	$person_name = $person_f_name.$person_l_name;
	            	$list_ppl = array($x => array('profile_pic_name'=>$profile_pic_name,
	            						  'person_name' =>$person_name));
            	}
	            
            }
            return Response::json(array(
			            'status' => true,
			            'response' => $people_liked_reply      
			    	));
        }
    }

    public function dislike_reply(Request $request)
    {
    	$list_ppl =array();
    	$msg = 'people who disliked reply..!!';
    	$people_disliked_reply = Reply::where('id',$request->id)->first()->dislike;
    	
    	if($people_disliked_reply->first() == null)
		{
              return Response::json(array(
			            'status' => false,
			            'message' => "no one disliked reply..!!"        
			    	));
		}
        else
        {
        	$x=0;
        	foreach($people_disliked_reply as $each_people)
            {

            	if($each_people->user != null)
            	{
            		$x++;
            		$profile_pic_name = $each_people->user->profile_picture;  
	            	$person_f_name= $each_people->user->first_name; 
	            	$person_l_name= $each_people->user->last_name;
	            	$person_name = $person_f_name.$person_l_name;
	            	$list_ppl = array($x => array('profile_pic_name'=>$profile_pic_name,
	            						  'person_name' =>$person_name));
            	}
	            
            }
            return Response::json(array(
			            'status' => true,
			            'response' => $people_disliked_reply        
			    	));
        }
    }

}
