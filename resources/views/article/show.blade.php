@extends('layouts.article')

@section('title')
    Read Full Article
@endsection

@section('article-content')

<style type="text/css">
    .social-actions span{
        font-size: 10px;
    }
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript">

 function openEdit(id)
 {
    //alert(id);
    $('#reply-body-material-'+id).hide();
    $("#reply-body-edit-id-"+id).show();
 }

 function increase_like_article(id)
 {
    var ses_id = "{{Session::get('id')}}";
    if(ses_id == null)
    {
        window.location.replace('/login');
    }
    var article_id = id;
    //alert(article_id);
    $.ajax({
        type: 'POST',
        url: "{{ route('article_like_increase') }}",
        data: {id: article_id, _token: "{{ csrf_token() }}"},
        success: function (response){

           // alert(response);
            $('#article_div_like_'+id).html(response.like);
            $('#article_div_dislike_'+id).html(response.dislike); 
           
        }
    });
 }
 function decrease_like_article(id)
 {
    var ses_id = "{{Session::get('id')}}";
    if(ses_id == null)
    {
        window.location.replace('/login');
    }
    var article_id = id;
    //alert(article_id);
    $.ajax({
        type: 'POST',
        url: "{{ route('article_like_decrease') }}",
        data: {id: article_id, _token: "{{ csrf_token() }}"},
        success: function (response){

            //alert(response.like);
          $('#article_div_like_'+id).html(response.like);
          $('#article_div_dislike_'+id).html(response.dislike);
          
        }
    });
 }
 function increase_like_comment(id)
 {
    var ses_id = "{{Session::get('id')}}";
    if(ses_id == null)
    {
        window.location.replace('/login');
    }

    var comment_id = id;
    //alert(article_id);
    $.ajax({
        type: 'POST',
        url: "{{ route('comment_like_increase') }}",
        data: {id: comment_id, _token: "{{ csrf_token() }}"},
        success: function (response){

           // alert(response);
            $('#comment_div_like_'+id).html(response.like);
            $('#comment_div_dislike_'+id).html(response.dislike); 
        }
    });
 }
 function decrease_like_comment(id)
 {
    var ses_id = "{{Session::get('id')}}";
    if(ses_id == null)
    {
        window.location.replace('/login');
    }

    var comment_id = id;
    //alert(article_id);
    $.ajax({
        type: 'POST',
        url: "{{ route('comment_like_decrease') }}",
        data: {id: comment_id, _token: "{{ csrf_token() }}"},
        success: function (response){

            //alert(response);
          $('#comment_div_like_'+id).html(response.like);
          $('#comment_div_dislike_'+id).html(response.dislike); 
        }
    });
 }
 function increase_like_reply(id)
 {
    var ses_id = "{{Session::get('id')}}";
    if(ses_id == null)
    {
        window.location.replace('/login');
    }

    var reply_id = id;
    //alert(article_id);
    $.ajax({
        type: 'POST',
        url: "{{ route('reply_like_increase') }}",
        data: {id: reply_id, _token: "{{ csrf_token() }}"},
        success: function (response){

           // alert(response);
            $('#reply_div_like_'+id).html(response.like);
            $('#reply_div_dislike_'+id).html(response.dislike); 
        }
    });
 }
 function decrease_like_reply(id)
 {
    var ses_id = "{{Session::get('id')}}";
    if(ses_id == null)
    {
        window.location.replace('/login');
    }
    var reply_id = id;
    //alert(article_id);
    $.ajax({
        type: 'POST',
        url: "{{ route('reply_like_decrease') }}",
        data: {id: reply_id, _token: "{{ csrf_token() }}"},
        success: function (response){

            //alert(response);
          $('#reply_div_like_'+id).html(response.like);
          $('#reply_div_dislike_'+id).html(response.dislike); 
        }
    });
 }
 function submitbtn_rep(id)
 {
    
    var replyText = $('#reply_body_'+id).val();
    var replyId   = $('#reply_id_'+id).val();
    //alert(replyId);
        $.ajax({
        type: 'POST',
        url: "{{ route('edit_reply_route') }}",
        data: {reply_body: replyText, _token: "{{ csrf_token() }}", reply_id: replyId, submit_stat: 1, cancel_stat:-1},
        success: function (response) {
            //alert(response);
            $("#reply-body-edit-id-"+id).hide();
            $('#reply-body-material-'+id).html(response);
            $('#reply-body-material-'+id).show();
      }
    });
 }
 function cancelbtn_rep(id)
 {
    
    var replyText = $('#reply_body_'+id).val();
    var replyId   = $('#reply_id_'+id).val();
    //alert(replyText);
    $.ajax({
        type: 'POST',
        url: "{{ route('edit_reply_route') }}",
        data: {reply_body: replyText, _token: "{{ csrf_token() }}", reply_id: replyId, submit_stat: -1, cancel_stat:1},
        success: function (response) {
            //alert(response);
            $("#reply-body-edit-id-"+id).hide();
            $('#reply-body-material-'+id).html(response);
            $('#reply-body-material-'+id).show();
      }
    });
 }
 function openEditcomment(id)
 {
    //alert(id);
    $('#comment-body-material-'+id).hide();
    $("#comment-body-edit-id-"+id).show();
 }
 function submitbtn_com(id)
 {
    
    var commentText = $('#comment_body_'+id).val();
    var commentId   = $('#comment_id_'+id).val();
    //alert(commentId);
    $.ajax({
        type: 'POST',
       url: "{{ route('edit_comment_route') }}",
        data: {comment_body: commentText, _token: "{{ csrf_token() }}", comment_id: commentId, submit_stat: 1, cancel_stat:-1},
        success: function (response) {
            //alert(response);
            $("#comment-body-edit-id-"+id).hide();
            $('#comment-body-material-'+id).html(response);
            $('#comment-body-material-'+id).show();
      }
    });
 }
 function cancelbtn_com(id)
 {
    
    var commentText = $('#comment_body_'+id).val();
    var commentId   = $('#comment_id_'+id).val();
    //alert(replyId);
    $.ajax({
        type: 'POST',
       url: "{{ route('edit_comment_route') }}",
        data: {comment_body: commentText, _token: "{{ csrf_token() }}", comment_id: commentId, submit_stat: -1, cancel_stat:1},
        success: function (response) {
            //alert(response);
            $("#comment-body-edit-id-"+id).hide();
            $('#comment-body-material-'+id).html(response);
            $('#comment-body-material-'+id).show();
      }
    });
 }
 
</script>


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
            <img class="media-object" src="/uploads/profile_pic/{{$article->user->profile_picture }}" style="width:65px; height:65px; float:left; border-radius:10%; margin-right:25px; ">
        <!-- Date/Time -->
        <p class="normal">
        <a href="{{  URL::to('userarticle/'.$article->user_id) }}">

        <span class="glyphicon glyphicon-user"></span> {{ $article->user->first_name }} {{ $article->user->last_name }}</a>&nbsp; <span class="glyphicon glyphicon-time"></span> {{ $article->created_at }}</p>
        <p>
        <hr><br>
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




            <div class="row col-md-12 social-actions" id="article_div_{{$article->div}}">

            <div class='col-md-2'>
                @if($article->like->where('user_id',Session::get('id'))->where('article_id',$article->id)->first()!=null)

                     <form action="#" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="button" id="article-like-{{$article->id}}" onclick="increase_like_article('{{$article->id}}')" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-thumbs-up"></i>
                        </button>
                         <span id="article_div_like_{{$article->id}}"> LIKES: {{ $article->likes }} | </span>
                    </form>
                    
                @else
                        <form action="#" method="POST" >
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="button" id="article-like-{{$article->id}}" onclick="increase_like_article('{{$article->id}}')" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-thumbs-o-up"></i>
                            </button>
                            <span id="article_div_like_{{$article->id}}"> LIKES: {{ $article->likes }} | </span>
                        </form>

                @endif
            </div>
                    
                

                
               <div class='col-md-2'>
                    @if($article->dislike->where('user_id',Session::get('id'))->where('article_id',$article->id)->first() !=null)
                    <form action="#" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="button" id="article-dislike-{{$article->id}}" onclick="decrease_like_article('{{$article->id}}')" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-thumbs-down"></i>
                        </button>
                        <span id="article_div_dislike_{{$article->id}}">DISLIKES: {{ $article->dislikes }} | </span>
                    </form>
                        


                @else
                    <form action="#" method="POST">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="button" id="article-dislike-{{$article->id}}" onclick="decrease_like_article('{{$article->id}}')" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-thumbs-o-down"></i>
                        </button>
                        <span id="article_div_dislike_{{$article->id}}">DISLIKES: {{ $article->dislikes }} | </span>
                    </form>
                        
                    

                @endif
               

               </div>
                  
                <div class='col-md-2'>
                    <small>
                    <a href="/View/article/{{$article->id}}"><i class="fa fa-binoculars fa-border"></i></a> {{ $article->views }}|
                </small>

                </div>
                
                    
                

                 
               </div>     

                <br><hr>
                @include('layouts.fbshare_')
                <hr>
            
        <hr>
       </p>

        <!-- Comment -->
        
        @foreach($article->comment as $comment)
        <hr>
        <div class="media">
        
            <a class="pull-left" href="#">
                <img class="media-object" src="/uploads/profile_pic/{{$comment->user->profile_picture }}" style="width:65px; height:65px; float:left; border-radius:150%; margin-right:25px; ">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{ $comment->user->first_name }}{{' '}}{{ $comment->user->last_name }} <small>{{ $comment->created_at }}</small>
                
                    
                    
                    <div class="col-md-12 social-actions">
                        
                         

                        <div class="col-md-3">
                            
                            @if($comment->like->where('user_id',Session::get('id'))->where('comment_id',$comment->id)->first()!=null)
                            <form action="#" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="button" id="comment-like-{{$comment->id}}" onclick="increase_like_comment('{{$comment->id}}')" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-thumbs-up"></i>
                                </button>
                                    <span id="comment_div_like_{{$comment->id}}"> LIKES: {{ $comment->likes }} | </span>
                            </form>   
                        @else
                            <form action="#" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="button" id="comment-like-{{$comment->id}}" onclick="increase_like_comment('{{$comment->id}}')" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-thumbs-o-up"></i>
                                </button>
                                    <span id="comment_div_like_{{$comment->id}}"> LIKES: {{ $comment->likes }} | </span>
                            </form> 
                        @endif

                        </div>
                         
                    
                        <div class="col-md-4">
                            @if($comment->dislike->where('user_id',Session::get('id'))->where('comment_id',$comment->id)->first()!=null)
                            <form action="#" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="button" id="comment-dislike-{{$comment->id}}" onclick="decrease_like_comment('{{$comment->id}}')" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-thumbs-down"></i>
                                </button>
                                    <span id="comment_div_dislike_{{$comment->id}}">DISLIKES: {{ $comment->dislikes }} | </span>
                            </form>
                            @else
                             <form action="#" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="button" id="comment-dislike-{{$comment->id}}" onclick="decrease_like_comment('{{$comment->id}}')" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-thumbs-o-down"></i>
                                </button>
                                    <span id="comment_div_dislike_{{$comment->id}}">DISLIKES: {{ $comment->dislikes }} | </span>
                            </form>

                            @endif
                        </div>
                        
                    
                   
                    <div class="pull-right" >
                    @if(Session::get('id')==$comment->user_id)
                     
                        <!-- <a href="{{ route('comment.edit', [$comment->id]) }}" style="float: left"> -->
                        <button type="button" id="comment-butn-id" onclick="openEditcomment('{{$comment->id}}')" class="btn btn-xs comment-butn" style="float: left">
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
                   

                    </div>
                    </h4>

                <br>
                

                    <div id="comment-body-material-{{$comment->id}}" class="well comment-body-material" >
                        {{ $comment->comment_body }}
                    </div>

                   <div id="comment-body-edit-id-{{$comment->id}}" class="well comment-body-edit" style="display:none">
                        <h4>Edit Comment:</h4>
                        <form role="form" method="POST"  action="/cmt">
                            <div class="form-group">
                                <textarea type="input" id="comment_body_{{$comment->id}}" name="comment_body" class="form-control" rows="5">{{ $comment->comment_body }}</textarea>
                            </div>
                            <input type="hidden" id="comment_id_{{$comment->id}}" name="comment_id" value="{{ $comment->id }}">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">


                            <button type="button" onclick="submitbtn_com({{$comment->id}})" name="submit_btn_for_cmt" value="1" class="btn btn-primary pull-left">Edit Comment</button>
                            <button type="button" onclick="cancelbtn_com({{$comment->id}})" name="cancel_btn_for_cmt" value="1" class="btn btn-primary pull-right"> <i class="fa fa-times fa-1x"></i> </button>

                            <br />

                        </form>
                    </div>
                <!-- Nested Comment -->
                <hr>
                @foreach($comment->reply as $reply)
                    <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="/uploads/profile_pic/{{$reply->user->profile_picture }}" style="width:45px; height:45px; float:left; border-radius:150%; margin-right:25px; ">
                    </a>
                    <div class="media-body">
                        <h5 class="media-heading">{{ $reply->user->first_name }}{{' '}}{{ $reply->user->last_name }} 
                            <small>{{ $reply->created_at }}</small>
                           
                            <div class="col-md-12 social-actions">

                            <div class="col-md-3 social-actions">
                                
                                @if($reply->like->where('user_id',Session::get('id'))->where('reply_id',$reply->id)->first() != null)
                                <form action="#" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="button" id="reply-like-{{$reply->id}}" onclick="increase_like_reply('{{$reply->id}}')" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-thumbs-up"></i>
                                </button>
                                <span id="reply_div_like_{{$reply->id}}"> LIKES: {{ $reply->likes }} | </span>
                                </form>  
                            @else
                                <form action="#" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="button" id="reply-like-{{$reply->id}}" onclick="increase_like_reply('{{$reply->id}}')" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-thumbs-o-up"></i>
                                </button>
                                <span id="reply_div_like_{{$reply->id}}"> LIKES: {{ $reply->likes }} | </span>
                                </form> 
                            @endif
                            </div>

                            <div class="col-md-4 social-actions">
                                 @if($reply->dislike->where('user_id',Session::get('id'))->where('reply_id',$reply->id)->first() != null)
                                <form action="#" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="button" id="reply-dislike-{{$reply->id}}" onclick="decrease_like_reply('{{$reply->id}}')" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-thumbs-down"></i>
                                </button>
                                    <span id="reply_div_dislike_{{$reply->id}}">DISLIKES: {{ $reply->dislikes }} | </span>
                                </form>
                            @else
                                <form action="#" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="button" id="reply-dislike-{{$reply->id}}" onclick="decrease_like_reply('{{$reply->id}}')" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-thumbs-o-down"></i>
                                </button>
                                    <span id="reply_div_dislike_{{$reply->id}}">DISLIKES: {{ $reply->dislikes }} | </span>
                                </form>

                            @endif
                            </div>
                                <div class="pull-right">
                            @if( Session::get('id')==$reply->user_id)
                            
                                
                                <button type="button" id="reply_btn_" onclick="openEdit('{{$reply->id}}')" class="btn btn-xs reply-butn" style="float: left">
                                    <i class="fa fa-pencil fa-1x"></i>
                                </button>
                            
                            @endif

                            @if(Session::get('id')==$comment->user_id or Session::get('id')==$article->user_id or Session::get('id')==$reply->user_id)
                                <form action="{{ route('reply.destroy', [$reply->id]) }}" method="POST" style="float: left">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="submit" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-times fa-1x"></i></button>
                                </form>
                            @endif
                            </div>

                            </div>


                        </h5>
                        <br>
                         <div id="reply-body-material-{{ $reply->id }}" class="well reply-body-material">
                                {{ $reply->reply_body }}
                        </div>
                        <div id="reply-body-edit-id-{{$reply->id}}" style="display:none" class="well reply-body-edit">
                        

                        <h4>Edit Reply:</h4>
                        <form role="form" method="POST"  action="/rply">
                            <div class="form-group">
                            <textarea type="input" id="reply_body_{{$reply->id}}" name="reply_body" class="form-control" rows="4">{{ $reply->reply_body }}</textarea>
                            </div>
                            <input type="hidden" id="reply_id_{{$reply->id}}" name="reply_id" value="{{ $reply->id }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="button" onclick="submitbtn_rep({{$reply->id}})" name="submit_btn" value="1" class="btn btn-primary pull-left">Edit Reply</button>
                            <button type="button" onclick="cancelbtn_rep({{$reply->id}})" name="cancel_btn" value="1" class="btn btn-primary pull-right"> <i class="fa fa-times fa-1x"></i> </button>
                            <br />
                        </form>



                    </div>
                </div>
                @endforeach
               {{ 'here' }}
                <div id="reply-form" class="well" >
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
            </div>
            <hr>
             </div>
             <hr>
        @endforeach
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
