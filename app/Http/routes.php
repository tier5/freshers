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
    //Auth Routes

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
        Route::get('article/new', [
            'uses' => 'ArticleController@create',
            'as' => 'article.create'
        ]);
        Route::post('article', [
            'uses' => 'ArticleController@store',
            'as' => 'article.store'
        ]);
        Route::get('article/{slug}/edit', [
            'uses' => 'ArticleController@edit',
            'as' => 'article.edit'
        ]);
        Route::Patch('article/{slug}', [
            'uses' => 'ArticleController@update',
            'as' => 'article.update'
        ]);
        Route::Put('article/{slug}', [
            'uses' => 'ArticleController@update',
            'as' => 'article.update'
        ]);
        Route::delete('article/{slug}', [
            'uses' => 'ArticleController@destroy',
            'as' => 'article.destroy'
        ]);

        Route::resource('comment', 'CommentController', ['names'=> ['index' => 'comment.index']]);

        Route::post('cmt', 'CommentController@edit');

        Route::resource('reply', 'ReplyController', ['names'=> ['index' => 'comment.index']]);

        //Route::post('rply', ['uses' => 'ReplyController@edit','as' => 'replyEditroute']);

        Route::post('/test', [
            'uses' => 'ReplyController@edit',
            'as' => 'edit_reply_route'
        ]);

        Route::post('/cv', [
            'uses' => 'CommentController@edit',
            'as' => 'edit_comment_route'
        ]);

        Route::post('/Like/article',    [
            'uses'=>'LSVController@likearticle',
            'as'=>'article_like_increase'
        ]);

        Route::post('/Dislike/article', [
            'uses'=>'LSVController@dislikearticle',
            'as'=>'article_like_decrease'
        ]);

        Route::post('/Like/comment',    [
            'uses'=>'LSVController@likecomment',
            'as'=>'comment_like_increase'
        ]);

        Route::post('/Dislike/comment', [
            'uses'=>'LSVController@dislikecomment',
            'as'=>'comment_like_decrease'
        ]);

        Route::post('/Like/reply',      [
            'uses'=>'LSVController@likereply',
            'as'=>'reply_like_increase'
        ]);

        Route::post('/Dislike/reply',   [
            'uses'=>'LSVController@dislikereply',
            'as'=>'reply_like_decrease'
        ]);

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
        Route::get('/lll', 'm1@test');
        Route::post('/req_modal',['uses'=>'ModalController@like_article', 'as'=>'show_modal']);
        Route::post('/req_dislike_article',['uses'=>'ModalController@dislike_article', 'as'=>'show_modal_dislike_article']);
        Route::post('/req_view_article',['uses'=>'ModalController@view_article', 'as'=>'show_modal_view_article']);
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

        //Admin Routes

        Route::group(['prefix' => 'admin','middleware'=>'admin'], function() {

            Route::get('/', [
                'uses' => 'AdminController@getIndex',
                'as' => 'admin.index'
            ]);
            Route::resource('category', 'CategoryController');
            Route::resource('tag', 'TagController');
            Route::get('blog/management', [
                'uses' => 'AdminController@blogmanagement',
                'as' => 'blogmanagement'
            ]);
            Route::get('user',[
                'uses' => 'AdminController@usertable',
                'as' => 'admin.user.index'
            ]);

            Route::get('usermanagement/edit/{id}', [
                'uses' => 'AdminController@getedituser',
            ]);
            Route::patch('user/edit/{id}', [
                'uses' => 'AdminController@postedituser',
                'as' => 'admin.user.edit'
            ]);
            Route::delete('usermanagement/delete/{id}', [
                'uses' => 'AdminController@deleteuser',
                'as' => 'adminuserdelete'
            ]);
            Route::get('userprofile/{id}', [
                'uses' => 'AdminController@viewuser'
            ]);
            Route::get('bar/blod',[
                'uses' => 'AdminController@blogbardata',
                'as' => 'getbarforblog'
            ]);
            Route::get('bar/registration',[
                'uses' => 'AdminController@registrationbardata',
                'as' => 'getbarforregisttration'
            ]);
            Route::patch('user/demote/{id}', [
                'uses' => 'AdminController@demoteadmin',
                'as' => 'admin.user.demote'
            ]);
            Route::patch('user/promote/{id}', [
                'uses' => 'AdminController@promoteuser',
                'as' => 'admin.user.promote'
            ]);
            Route::get('email/reply/{id}', [
                'uses' => 'AdminController@getemailbody',
                'as' => 'admin.email.reply'
            ]);
            Route::post('email/reply/postreply', [
                'uses' => 'AdminController@postreply',
                'as' => 'admin.postreply'
            ]);
            Route::get('email/inbox', [
                'uses' => 'AdminController@inbox',
                'as' => 'admin.inbox'
            ]);
            Route::delete('email/delete/{id}', [
                'uses' => 'AdminController@delete',
                'as' => 'message.delete'
            ]);
            Route::get('contact/management/{id}', [
                'uses' => 'AdminController@contactmanagement',
                'as' => 'contactmanagement'
            ]);
        });

    });

    //General Routes

    Route::get('/', [
        'uses' => 'AppController@getIndex',
        'as' => 'app.index'
    ]);
    Route::get('article', [
        'uses' =>'ArticleController@index',
        'as' => 'article.index'
    ]);

    Route::get('article/{slug}', [
        'uses' => 'ArticleController@show',
        'as' => 'article.show'
    ]);
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
    Route::get('login', [
        'uses' => 'UserController@getLogin',
        'as' => 'login'
    ]);
    Route::post('login', [
        'uses' => 'UserController@postLogin',
        'as' => 'postlogin'
    ]);
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
    Route::get('tags/{tag}',[
        'uses' => 'ArticleController@tags',
        'as' => 'showtagarticle'
    ]);
    Route::get('categories/{category}',[
        'uses' => 'ArticleController@category',
        'as' => 'showcategoryarticle'
    ]);


    //Routes For Search


    Route::group(['prefix' => 'search'], function () {
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
});

//Routes For Subdomain

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
        if($sub) {
            if ($sub->publish == 1) {
                $user = \App\User::where('id', '=', $sub->user_id)->first();
                return view('subdomain.about', ['user' => $user, 'subdomain' => $sub]);
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
