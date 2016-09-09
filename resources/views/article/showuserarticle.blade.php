@extends('layouts.article')

@section('title')
    Read Article
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
 @foreach($articles as $article)
    <div class="col-lg-8">
        <!-- Blog Post -->
        <!-- Title -->
        <h1>{{ $article->title }}</h1>
        <!-- Author -->
        @if(Session::get('id')==$article->user_id)
        <div class="pull-right">
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
        <p class="normal"><a href=""><span class="glyphicon glyphicon-user"></span> {{ $article->user->first_name }} {{ $article->user->last_name }}</a> <span class="glyphicon glyphicon-time"></span> {{ $article->created_at }}</p>
        <p>
        <p class="lead">{!! $article->body !!}</p>
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
        <!-- Post Content -->
        <!-- Blog Comments -->
        <!-- Comments Form -->
        <small>

            @if($article->like->where('user_id',Session::get('id'))->where('article_id',$article->id)->first()!=null)
                    <a href="/Like/article/{{$article->id}}"><button style="border:none;background:none;"><i class="fa fa-thumbs-up"></i> </button></a> {{ $article->likes }} |

                @else
                    <a href="/Like/article/{{$article->id}}"><button style="border:none;background:none;"><i class="fa fa-thumbs-o-up"></i> </button></a> {{ $article->likes }} |

                @endif
               
                @if($article->dislike->where('user_id',Session::get('id'))->where('article_id',$article->id)->first() !=null)
                    <a href="/Dislike/article/{{$article->id}}"><button style="border:none;background:none;"><i class="fa fa-thumbs-down"></i> </button></a> {{ $article->dislikes }}|

                @else
                    <a href="/Dislike/article/{{$article->id}}"><button style="border:none;background:none;"><i class="fa fa-thumbs-o-down"></i> </button></a> {{ $article->dislikes }}|

                @endif
                <a href="/View/article/{{$article->id}}"><i class="fa fa-binoculars fa-border"></i></a> {{ $article->views }}|

                <a href="/Share/article/{{$article->id}}"><button  class="butn-share-class" style="border:none;background:none;"><i class="fa fa-share fa-border"></i></button></a> {{ $article->shares }}
                <br><hr>
                @include('layouts.fbshare_')
                <hr>
            </small>
        <hr>
        

       
        <!-- Comment -->
        <div class="media">
        @foreach($article->comment as $comment)
            <a class="pull-left" href="#">
                <img class="media-object" src="/uploads/profile_pic/{{$comment->user->profile_picture }}" style="width:65px; height:65px; float:left; border-radius:150%; margin-right:25px; ">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{ $comment->user->first_name }}{{' '}}{{ $comment->user->last_name }} 
                    <small>{{ $comment->created_at }}</small>
                    
                    <small style="float:central"> 
                        @if($comment->like->where('user_id',Session::get('id'))->where('comment_id',$comment->id)->first()!=null)
                        <a href="/Like/comment/{{$comment->id}}"><button style="border:none;background:none;"><i class="fa fa-thumbs-up"></i> </button></a> {{ $comment->likes }} | 
                    @else
                        <a href="/Like/comment/{{$comment->id}}"><button style="border:none;background:none;"><i class="fa fa-thumbs-o-up"></i> </button></a> {{ $comment->likes }} |
                    @endif
                    
                    @if($comment->dislike->where('user_id',Session::get('id'))->where('comment_id',$comment->id)->first()!=null)
                        <a href="/Dislike/comment/{{$comment->id}}"><button style="border:none;background:none;"><i class="fa fa-thumbs-down"></i> </button></a> {{ $comment->dislikes }} | 
                    @else
                        <a href="/Dislike/comment/{{$comment->id}}"><button style="border:none;background:none;"><i class="fa fa-thumbs-o-down"></i> </button></a> {{ $comment->dislikes }} |

                    @endif
                    
                   
                        <a href="/Share/comment/{{$comment->id}}"><button style="border:none;background:none;"><i class="fa fa-share"></i> </button></a> {{ $comment->shares }} | 
                    <div class="pull-right" >
                    @if(Session::get('id')==$comment->user_id)
                     
                        <!-- <a href="{{ route('comment.edit', [$comment->id]) }}" style="float: left"> -->
                        <button type="button" class="btn btn-xs comment-butn" style="float: left">
                        <i class="fa fa-pencil fa-1x"></i>
                        </button>
                    @endif

                        <!-- </a>  -->
                        @if(Session::get('id')==$comment->user_id or Session::get('id')==$article->user_id)
                        <form action="{{ route('comment.destroy', [$comment->id]) }}" method="POST" style="float: left">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-times fa-1x"></i></button>  
                        </form>
                    @endif
                    </div> 
                    </small>

                
                </h4>
                <div class="well comment-body-material">
                    {{ $comment->comment_body }}
                </div>
                <div class="well comment-body-edit">
                        <h4>Leave a Comment:</h4>
                        <form role="form" method="POST"  action="/cmt">
                            <div class="form-group">
                                <textarea type="input" name="comment_body" class="form-control" rows="5">{{ $comment->comment_body }}</textarea>
                            </div>
                            <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" name="submit_btn" value="1" class="btn btn-primary pull-left">Comment</button>
                            <button type="submit" name="cancel_btn" value="1" class="btn btn-primary pull-right"> <i class="fa fa-times fa-1x"></i> </button>
                            <br />
                        </form>
                    </div>
                <!-- Nested Comment -->
                <hr>
                <?php $store_reply; ?>
                @foreach($comment->reply as $reply)

                    <?php $store_reply = $reply ?>
                    <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="/uploads/profile_pic/{{$reply->user->profile_picture }}" style="width:45px; height:45px; float:left; border-radius:150%; margin-right:25px; ">
                    </a>
                    <div class="media-body">
                        <h5 class="media-heading">{{ $reply->user->first_name }}{{' '}}{{ $reply->user->last_name }} 
                            <small>{{ $reply->created_at }}</small>
                            <small style="float:center"> 

                            @if($reply->like->where('user_id',Session::get('id'))->where('reply_id',$reply->id)->first() != null)
                                <a href="/Like/reply/{{$reply->id}}"><button style="border:none;background:none;"><i class="fa fa-thumbs-up"></i> </button></a> {{ $reply->likes }} |
                            @else
                                <a href="/Like/reply/{{$reply->id}}"><button style="border:none;background:none;"><i class="fa fa-thumbs-o-up"></i> </button></a> {{ $reply->likes }} |
                            @endif

                            @if($reply->dislike->where('user_id',Session::get('id'))->where('reply_id',$reply->id)->first() != null)
                                <a href="/Dislike/reply/{{$reply->id}}"><button style="border:none;background:none;"><i class="fa fa-thumbs-down"></i> </button></a> {{ $reply->dislikes }}
                            @else
                                <a href="/Dislike/reply/{{$reply->id}}"><button style="border:none;background:none;"><i class="fa fa-thumbs-o-down"></i> </button></a> {{ $reply->dislikes }} |

                            @endif
                            
                            <div class="pull-right">
                            @if( Session::get('id')==$reply->user_id)
                            
                            <a href="{{ route('reply.edit', [$reply->id]) }}" style="float: left">
                                <button type="button" class="btn btn-xs reply-butn" style="float: left">
                                    <i class="fa fa-pencil fa-1x"></i>
                                </button>
                            </a>
                            @endif

                            @if(Session::get('id')==$comment->user_id or Session::get('id')==$article->user_id or Session::get('id')==$reply->user_id)
                                <form action="{{ route('reply.destroy', [$reply->id]) }}" method="POST" style="float: left">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-times fa-1x"></i></button>
                                </form>
                            @endif
                            </small>

                        </h5>
                        <div class="well reply-body-material">
                            {{ $reply->reply_body }}
                        </div>
                        <div class="well reply-body-edit">
                        <h4>Edit Reply:</h4>
                        <form role="form" method="POST"  action="/rply">
                            <div class="form-group">
                                <textarea type="input" name="reply_body" class="form-control" rows="4">{{ $reply->reply_body }}</textarea>
                            </div>
                            <input type="hidden" name="reply_id" value="{{ $reply->id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="submit" name="submit_btn" value="1" class="btn btn-primary pull-left">Reply</button>
                            <button type="submit" name="cancel_btn" value="1" class="btn btn-primary pull-right"> <i class="fa fa-times fa-1x"></i> </button>
                            <br />
                        </form>
                        </div>
                        <hr>
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
@endforeach
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>

jQuery(document).ready(function($){
    
    $(".comment-body-material").show();
    $(".comment-body-edit").hide();
    $(".comment-butn").on("click",function(){
        $(".comment-body-material").hide();
        $(".comment-body-edit").show();
    });

    $(".reply-body-material").show();
    $(".reply-body-edit").hide();
    $(".reply-butn").on("click",function(){
        $(".reply-body-material").hide();
        $(".reply-body-edit").show();
    });
});


</script>