<?php

namespace App\Http\Controllers;
use App\Reply;
use App\Article;
use App\User;
use App\Comment;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Session;

class ReplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getFacebookLogin($auth = NULL)
    {
        
        if($auth == 'auth')
        {
            try
            {
                Hybrid_Endpoint::process();
            }
            catch (Exception $e)
            {
                return Redirect::to('fbauth');
            }
            return;
        }
        $auth = new Hybrid_Auth(app_path(). '/config/fb_auth.php');
        $provider = $oauth->authenticate('Facebook');
        $profile = $provider->getUserProfile();
        return var_dump($profile).'<a href="logout">Log Out</a>';
    }
    public function getLoggedOut()
    {
        $fauth=new Hybrid_auth(app_path().'/config/fb_auth.php');
        $fauth->logoutAllProviders();
        return View::make('login');

    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $user_id=Session::get('id');
       $this->validate($request, [
                'reply_body'=>'required|max:2000|min:1'
        ]);
        

        $reply = new Reply();
        $reply->reply_body = $request->reply_body;
        $reply->comment_id  = $request->comment_id; //hidden variable
        $reply->user_id = $user_id;
        $reply->likes = 0;
        $reply->dislikes =0;
        $reply->shares= 0;
        $reply->save();

        $request->session()->flash('success', 'Replied Successfully!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //return($request->submit_stat);
        //return ('here');
        $reply=Reply::where('id',$request->reply_id)->first();
        if($request->submit_stat == 1)
        {    
            $reply->reply_body = $request->reply_body;
            $reply->save();
            return $request->reply_body;
        }
        else if($request->cancel_stat == 1)
        {
            //
            return $reply->reply_body;
        }
        else
        {
            return("oh! snap..  error in ReplyController@edit");
        }
        //else{
        //    return('some error in ReplyController@edit');
        //}
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $reply = Reply::where('id',$id);
        $reply->delete();
        return back();
    }

    /*public function abc(Request $request)
    {
        return $request->reply_body;
    }*/
}
