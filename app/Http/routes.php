<?php


    Route::get('fbauth/{auth?}',array('as'=>'facebookAuth' , 'uses'=>'ReplyController@getFacebookLogin'));

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$router->group(array('domain' => 'laravelsite.dev'), function()
{
    Route::get('/', [
        'uses' => 'AppController@getIndex',
        'as' => 'app.index'
    ]);


    

    Route::resource('article', 'ArticleController', ['names'=> ['index' => 'article.index']]);

    //Route::get('/Like/comment/{id}',    'LSVController@likecomment');
    //Route::get('/Dislike/comment/{id}', 'LSVController@dislikecomment');
    Route::get('/Like/reply/{id}',      'LSVController@likereply');
    Route::get('/Dislike/reply/{id}',   'LSVController@dislikereply');
    
    Route::get('/Dislike/article/{id}', 'LSVController@dislikearticle');

    //Route::resource('article/{{article_id}}','ArticleController@show');

    Route::group(['prefix' => 'search'], function () 
    {
        Route::get('/', [
            'uses' => 'SearchController@search',
            'as' => 'search'
        ]);
        Route::get('tag/{id?}', [
            'uses' => 'SearchController@searchTag',
            'as' => 'search.tag'
        ]);
        Route::get('category/{id?}', [
            'uses' => 'SearchController@searchCategory',
            'as' => 'search.category'
        ]);
        Route::get('data', [
            'uses' => 'SearchController@getSearchData',
            'as' => 'search.data'
        ]);
    });

    
    Route::get('/userarticle/{user_id?}', [
        'uses' => 'ArticleController@userarticle',
    ]);

    Route::get('register',[
        'uses'=>'UserController@create',
        'as'=>'register'
    ]);

    Route::post('register',[
        'uses'=>'UserController@store',
        'as'=>'postregister'
    ]);

    

    Route::get('login',  ['uses' => 'UserController@getLogin',
        'as' => 'login'
    ]);

    
    Route::post('login', [
        'uses' => 'UserController@postLogin',
        'as' => 'postlogin'
    ]);

    
    Route::group(['middleware'=>'auth'],function() 
    {
        Route::get('logout', [
            'uses'=>'UserController@logout',
            'as'=>'logout'
        ]);
        Route::get('profile', [
            'uses' => 'UserController@profile',
            'as' => 'profile'
        ]);

        Route::get('logout', [
            'uses' => 'UserController@logout',
            'as' => 'logout'
        ]);
        Route::get('profile', [
            'uses' => 'UserController@profile',
            'as' => 'profile'
        ]);


        Route::get('editprofile', [
            'uses' => 'UserController@editprofile',
            'as' => 'editprofile'
        ]);
        Route::patch('editprofile', [
            'uses' => 'UserController@updateprofile',
            'as' => 'updateprofile'
        ]);


        Route::patch('resetprofilepassword', [
            'uses' => 'UserController@resetprofilepassword',
            'as' => 'resetprofilepassword'
        ]);


        Route::resource('comment', 'CommentController', ['names'=> ['index' => 'comment.index']]);

        Route::post('cmt', 'CommentController@edit');

        Route::resource('reply', 'ReplyController', ['names'=> ['index' => 'comment.index']]);

        //Route::post('rply', ['uses' => 'ReplyController@edit','as' => 'replyEditroute']);

        Route::post('/test', ['uses' => 'ReplyController@edit','as' => 'edit_reply_route']);

        Route::post('/testa', ['uses' => 'CommentController@edit','as' => 'edit_comment_route']);

        Route::post('/Like/article',    ['uses'=>'LSVController@likearticle',    'as'=>'article_like_increase']);

        Route::post('/Dislike/article', ['uses'=>'LSVController@dislikearticle', 'as'=>'article_like_decrease']);

        Route::post('/Like/comment',    ['uses'=>'LSVController@likecomment',    'as'=>'comment_like_increase']);

        Route::post('/Dislike/comment', ['uses'=>'LSVController@dislikecomment', 'as'=>'comment_like_decrease']);

        Route::post('/Like/reply',      ['uses'=>'LSVController@likereply',    'as'=>'reply_like_increase']);

        Route::post('/Dislike/reply',   ['uses'=>'LSVController@dislikereply', 'as'=>'reply_like_decrease']);


        Route::get('subdomain', [
            'uses' => 'SubdomainController@getSubdomain',
            'as' => 'getsubdomain'
        ]);
        Route::patch('subdomain', [
            'uses' => 'SubdomainController@update',
            'as' => 'updatesubdomain'
        ]);

    });

    Route::get('resetpassword', [
        'uses' => 'PasswordController@resetpassword',
        'as' => 'resetpassword'
    ]);
    Route::post('resetpassword', [
        'uses' => 'PasswordController@postresetpassword',
        'as' => 'resetpassword'
    ]);
    Route::get('password/reset/{token}',[
        'uses'=>'PasswordController@getreset',
        'as'=>'getreset'
    ]);
    Route::post('password/reset',[
        'uses'=>'PasswordController@postreset',
        'as'=>'postreset'
    ]);



    Route::get('about',[
        'uses'=>'PageController@about',
        'as'=>'about'
    ]);

    Route::get('contact',[
        'uses'=>'PageController@getcontact',
        'as'=>'getcontact'
    ]);

    Route::post('contact', [
        'uses'=>'PageController@postcontact',
        'as'=>'postcontact'
    ]);
   
}); //end of router group


$router->group(array('domain' => '{subdomain}.laravelsite.dev'), function()
{


    Route::get('/', function($subdomain) {
        $sub=\App\Subdomain::where('subdomain','=',$subdomain)->first();
        if($sub) {
            if($sub->publish==1) {
                $article = App\Article::where('user_id','=',$sub->user_id)->get();
                return view('subdomain.subdomain_app', ['articles' => $article,'subdomain' => $sub]);
            }
            else {
                abort(404);
            }
        }
        else {
            return Redirect::to('http://laravelsite.dev');
        }
    });
});

