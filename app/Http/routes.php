<?php

    Route::get('/aaa',function(){
        return view('article.view_who_reacted');
    });

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

    Route::get('/article/{{slug}}','ArticleController@show');

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
        'as'=>'user_profile_show'
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
         //Route::post('/comment',   ['uses'=>'CommentController@store', 'as'=>'store_new_comment']);

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

        Route::get('/lll', 'm1@test');

        Route::post('/req_modal',['uses'=>'ModalController@like_article', 'as'=>'show_modal']);

        Route::post('/req_modal_meme',['uses'=>'ModalController@like_meme', 'as'=>'show_modal_like_meme']);        

        Route::post('/req_dislike_article',['uses'=>'ModalController@dislike_article', 'as'=>'show_modal_dislike_article']);

        Route::post('/req_dislike_meme',['uses'=>'ModalController@dislike_meme', 'as'=>'show_modal_dislike_meme']);//new

        Route::post('/req_view_article',['uses'=>'ModalController@view_article', 'as'=>'show_modal_view_article']);

        Route::post('/req_view_view',['uses'=>'ModalController@view_meme', 'as'=>'show_modal_view_meme']);

        Route::post('/req_like_comment',['uses'=>'ModalController@like_comment', 'as'=>'show_modal_like_comment']);

        Route::post('/req_dislike_comment',['uses'=>'ModalController@dislike_comment', 'as'=>'show_modal_dislike_comment']);

        Route::post('/req_like_reply',['uses'=>'ModalController@like_reply', 'as'=>'show_modal_like_reply']);

        Route::post('/req_dislike_reply',['uses'=>'ModalController@dislike_reply', 'as'=>'show_modal_dislike_reply']);

        Route::post('new_comment', ['uses'=>'CommentController@store', 'as'=>'new_comment']);

        Route::post('new_reply', ['uses'=>'ReplyController@store', 'as'=>'new_reply']);

        Route::resource('comment', 'CommentController', ['names'=> ['store' => 'comment.store']]);

        Route::post('cmt', 'CommentController@edit');

        Route::resource('reply', 'ReplyController', ['names'=> ['index' => 'comment.index']]);

        //Route::post('rply', ['uses' => 'ReplyController@edit','as' => 'replyEditroute']);

        Route::post('/test', ['uses' => 'ReplyController@edit','as' => 'edit_reply_route']);

        Route::post('/cv', ['uses' => 'CommentController@edit','as' => 'edit_comment_route']);

        Route::post('/Like/article',    ['uses'=>'LSVController@likearticle',    'as'=>'article_like_increase']);

        Route::post('/Dislike/article', ['uses'=>'LSVController@dislikearticle', 'as'=>'article_like_decrease']);

        Route::post('/Like/comment',    ['uses'=>'LSVController@likecomment',    'as'=>'comment_like_increase']);

        Route::post('/Dislike/comment', ['uses'=>'LSVController@dislikecomment', 'as'=>'comment_like_decrease']);

        Route::post('/Like/reply',      ['uses'=>'LSVController@likereply',    'as'=>'reply_like_increase']);

        Route::post('/Dislike/reply',   ['uses'=>'LSVController@dislikereply', 'as'=>'reply_like_decrease']);

        Route::post('/Like/meme',    ['uses'=>'MemeController@likememe',    'as'=>'meme_like_increase']);

        Route::post('/Dislike/meme', ['uses'=>'MemeController@dislikememe', 'as'=>'meme_like_decrease']);

        Route::get('subdomain', [
            'uses' => 'SubdomainController@getSubdomain',
            'as' => 'getsubdomain'
        ]);
        Route::patch('subdomain/update', [
            'uses' => 'SubdomainController@update',
            'as' => 'updatesubdomain'
        ]);
        Route::patch('subdomain/publish', [
            'uses' => 'SubdomainController@publish',
            'as' => 'publishsubdomain'
        ]);

        Route::post('subdomaincheck', [
            'uses' => 'SubdomainController@check_availablity',
            'as' => 'subdomaincheck'
        ]);
        Route::get('photo/upload', [
            'uses' => 'MemeController@getupload',
            'as' => 'photo.upload'
        ]);
        Route::post('photo/upload', [
            'uses' => 'MemeController@postupload',
            'as' => 'postupload'
        ]);
        Route::get('view/meme', [
            'uses' => 'MemeController@view',
            'as' => 'view.meme'
        ]);
        Route::get('view/meme/your/{id}', [
            'uses' => 'MemeController@single',
            'as' => 'meme.single'
        ]);
        Route::post('view/meme/like', [
            'uses' => 'MemeController@like',
            'as' => 'meme.like'
        ]);
        Route::post('view/meme/dislike', [
            'uses' => 'MemeController@dislike',
            'as' => 'meme.dislike'
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
    Route::get('create/meme/{id}', [
        'uses' => 'MemeController@create',
        'as' => 'create.meme'
    ]);
    Route::post('meme/save', [
        'uses' => 'MemeController@save',
        'as' => 'meme.save'
    ]);
    Route::get('meme/view/all', [
        'uses' => 'MemeController@allmeme',
        'as' => 'meme'
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
    Route::get('tags/{tag}',[
        'uses' => 'ArticleController@tags',
        'as' => 'showtagarticle'
    ]);
    Route::get('categories/{category}',[
        'uses' => 'ArticleController@category',
        'as' => 'showcategoryarticle'
    ]);

});

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
    Route::get('/about',function ($subdomain) {
        $sub=\App\Subdomain::where('subdomain','=',$subdomain)->first();
    });
});
