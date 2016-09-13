@extends('layouts.article')

@section('title')
    Read Article
@endsection

@section('article-content')

    <!-- Blog Post Content Column -->
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
            //$('#likes_section_'+id).html(response.like);
            //$('#dislikes_section_'+id).html(response.dislike);


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
 @foreach($articles as $article)
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




            <div class="row col-md-12 social-actions" id="article_div_{{$article->id}}">

            <div class='col-md-2' id="likes_section_{{$article->id}}">
                @if($article->like->where('user_id',Session::get('id'))->where('article_id',$article->id)->first()!=null)

                     <form action="#" method="POST" id="article_like_form_{{$article->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="button" id="article-like-{{$article->id}}" onclick="increase_like_article('{{$article->id}}')" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-thumbs-up"></i>
                        </button>
                         <span id="article_div_like_{{$article->id}}"  > LIKES: {{ $article->likes }} | </span>
                    </form>
                    
                @else
                        <form action="#" method="POST" id="article_like_form_o_{{$article->id}}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <button type="button" id="article-like-{{$article->id}}" onclick="increase_like_article('{{$article->id}}')" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-thumbs-o-up"></i>
                            </button>
                            <span id="article_div_like_{{$article->id}}"> LIKES: {{ $article->likes }} | </span>
                        </form>

                @endif
            </div>
                    
                

                
               <div class='col-md-2' id="dislikes_section_{{$article->id}}">
                    @if($article->dislike->where('user_id',Session::get('id'))->where('article_id',$article->id)->first() !=null)
                    <form action="#" method="POST" id="article_dislike_form_{{$article->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="button" id="article-dislike-{{$article->id}}" onclick="decrease_like_article('{{$article->id}}')" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-thumbs-down"></i>
                        </button>
                        <span id="article_div_dislike_{{$article->id}}">DISLIKES: {{ $article->dislikes }} | </span>
                    </form>
                        


                @else
                    <form action="#" method="POST" id="article_dislike_form_o_{{$article->id}}">
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

                <div >
                    <?php $cnt_comments=0; $cnt_replies=0 ?>
                   @foreach($article->comment as $comments)
                        <?php $cnt_comments++ ; ?>
                        @foreach($comments->reply as $replies)
                            <?php $cnt_replies++; ?>
                        @endforeach
                   @endforeach
                    <h5> <a href="/article/{{$article->slug}}">{{$cnt_comments}} comments {{$cnt_replies}} replies</a> </h5>
                </div>
                
             </div>     

                <br><hr>
                @include('layouts.fbshare_')
                <hr>
            
        <hr>
       </p>
       
           

        </div>
        
 @endforeach
 @endsection
