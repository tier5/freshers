@extends('layouts.article')

@section('title')
    Read Full Article
@endsection

@section('article-content')
    @if (Session::has('success'))
        <div class="row">
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('success') }}
            </div>
        </div>
    @endif
     @if (Session::has('warning'))
        <div class="row">
            <div class="alert alert-warning">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('warning') }}
            </div>
        </div>
    @endif
    <!-- Blog Post Content Column -->
    <div class="col-lg-8">
        <!-- Blog Post -->
        <!-- Title -->
        <h1>{{ $article->title }}</h1>
        <!-- Author -->
            @if(Session::get('id')==$article->user_id)<div class="pull-right">
                <a href="{{ route('article.edit', [$article->slug]) }}" style="float: left">
                    <button type="button" class="btn btn-xs" style="float: left">
                        <i class="fa fa-pencil fa-2x"></i>
                    </button>
                </a>
                <form action="{{ route('article.destroy', [$article->slug]) }}" method="POST" style="float: left">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-times fa-2x"></i></button>
                </form>
            </div>
            @endif
            <p class="lead">
                by <a href="{{  URL::to('userarticle/'.$article->user_id) }}">{{ $article->user->first_name }} {{ $article->user->last_name }}</a>&nbsp;
            </p>
        <!-- Date/Time -->
        <p class="normal"><a href="{{  URL::to('userarticle/'.$article->user_id) }}"><span class="glyphicon glyphicon-user"></span> {{ $article->user->first_name }} {{ $article->user->last_name }}</a> <span class="glyphicon glyphicon-time"></span> {{ $article->created_at }}</p>
        <p>
        <p class="lead">{!! $article->body !!}</p>
        <a href="#">Like</a> {{ $article->likes }}
        <br />
        <p>
            @unless($article->tags->isEmpty())
                @foreach($article->tags as $tag)
                    <a href="#">
                        <span class="glyphicon glyphicon-tag"></span>{{ $tag->name }}
                    </a>
                @endforeach
            @endunless
        </p>
            <small>
                <a href="/Like/article/{{$article->id}}">Like</a> {{ $article->likes }}|
                <a href="/View/article/{{$article->id}}">View</a> {{ $article->views }}|
                <a href="/Share/article/{{$article->id}}">Share</a>{{ $article->shares }}
            </small>
        <hr>
        <!-- Posted Comments -->
        <!-- Comment -->

         <!-- @foreach($article->comment as $comment)
             <div class="media">
                <a class="pull-left" href="#">
                    <!-- <img class="media-object" src="http://placehold.it/64x64" alt=""> 
                    <img class="media-object" src="/uploads/profile_pic/{{$comment->user->profile_picture }}" style="width:35px; height:35px; float:left; border-radius:150%; margin-right:25px; ">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{ $comment->user->first_name }} {{$comment->user->last_name}}
                        <small>{{ $comment->created_at }}</small>
                    
                    </h4>
                    {{ $comment->comment_body }}
                </div>
            </div> 
        @endforeach -->

       

       
        <!-- Comment -->
        <div class="media">
        @foreach($article->comment as $comment)
            <a class="pull-left" href="#">
                <img class="media-object" src="/uploads/profile_pic/{{$comment->user->profile_picture }}" style="width:65px; height:65px; float:left; border-radius:150%; margin-right:25px; ">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{ $comment->user->first_name }}{{' '}}{{ $comment->user->last_name }} 
                    <small>{{ $comment->created_at }}</small>
                    
                    <small style="float:right"> 
                        <a href="/Like/comment/{{$comment->id}}">Like</a> {{ $comment->likes }} | 
                        <a href="/Share/comment/{{$comment->id}}">Share</a> {{ $comment->shares }} 
                    </small>

                
                </h4>
                {{ $comment->comment_body }}
                <!-- Nested Comment -->
                <?php $store_reply; ?>
                @foreach($comment->reply as $reply)

                    <?php $store_reply = $reply ?>
                    <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="/uploads/profile_pic/{{$reply->user->profile_picture }}" style="width:65px; height:65px; float:left; border-radius:150%; margin-right:25px; ">
                    </a>
                    <div class="media-body">
                        <h5 class="media-heading">{{ $reply->user->first_name }}{{' '}}{{ $reply->user->last_name }} 
                            <small>{{ $reply->created_at }}</small>
                            <small style="float:right"> 
                                <a href="/Like/reply/{{$reply->id}}">Likess</a> {{ $reply->likes }} ({{$reply->id}})
                            </small>

                        </h5>
                        {{ $reply->reply_body }}
                    </div>
                </div>
                @endforeach
                <br>

                <div class="well">
                    <h4>Leave a Reply:</h4>
                        <form role="form" method="POST"  action="/reply">
                        <div class="form-group">
                             <textarea type="input" name="reply_body" class="form-control" rows="1"></textarea>
                        </div>
                         <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-primary pull-right">Reply</button>
                        <br />
                        </form>
                </div>
                <!-- End Nested Comment -->
            </div>
            <br><br>
            <hr>
        @endforeach
        </div>
         <div class="well">
            <h4>Leave a Comment:</h4>
            <form role="form" method="POST"  action="/comment">
                <div class="form-group">
                    <textarea type="input" name="comment_body" class="form-control" rows="3"></textarea>
                </div>
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-primary pull-right">Comment</button>
                <br />
            </form>
        </div>
    </div>
@endsection
