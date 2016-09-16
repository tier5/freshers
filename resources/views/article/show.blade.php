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
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
        //alert(id);
        var ses_id = "{{Session::get('id')}}";
        if(ses_id == '')
        {
            $('#login_please_article').fadeIn(800);
            $('#login_please_article').fadeOut(1300);
            //window.location.replace('/login');
        }
        else
        {
            var article_id = id;
        $.ajax({
            type: 'POST',
            url: "{{ route('article_like_increase') }}",
            data: {id: article_id, _token: "{{ csrf_token() }}"},
            success: function (response){
               
                $('#like_name_article_'+id).text('LIKES:');
                $('#dislike_name_article_'+id).text('DISLIKES:');
                $('#article_div_like_'+id).html(response.like);
                $('#article_div_dislike_'+id).html(response.dislike);
                if($('#a_L_'+id).val() < response.like)
                {
                    $('#article-like-' + id).html('<i class="fa fa-thumbs-up"></i>');
                    $('#user_choice_article_like_'+id).text('You liked this article!');
                    $('#user_choice_article_like_'+id).fadeIn(900);
                    $('#user_choice_article_like_'+id).fadeOut(3000);
                }
                else
                {
                    $('#article-like-' + id).html('<i class="fa fa-thumbs-o-up"></i>');
                } 
                $('#article-dislike-' + id).html('<i class="fa fa-thumbs-o-down"></i>');
                $('#a_DL_'+id).val(response.dislike);
                $('#a_L_'+id).val(response.like);
            }
        });
        }
        
     }
     function decrease_like_article(id)
     {
        var ses_id = "{{Session::get('id')}}";
        if(ses_id == '')
        {
            $('#login_please_article').fadeIn(800);
            $('#login_please_article').fadeOut(1300);
            //window.location.replace('/login');
        }
        else
        {
            var article_id = id;
            $.ajax({
            type: 'POST',
            url: "{{ route('article_like_decrease') }}",
            data: {id: article_id, _token: "{{ csrf_token() }}"},
            success: function (response){
            $('#like_name_article_'+id).text('LIKES:');
            $('#dislike_name_article_'+id).text('DISLIKES:');
            $('#article_div_like_'+id).html(response.like);
            $('#article_div_dislike_'+id).html(response.dislike);
            if($('#a_DL_'+id).val() < response.dislike)
            {
               $('#article-dislike-' + id).html('<i class="fa fa-thumbs-down"></i>');
               $('#user_choice_article_dislike_'+id).text('You disliked this article!');
               $('#user_choice_article_dislike_'+id).fadeIn(900);
               $('#user_choice_article_dislike_'+id).fadeOut(3000);
            }
            else
            {
               $('#article-dislike-' + id).html('<i class="fa fa-thumbs-o-down"></i>');
            }

            $('#article-like-' + id).html('<i class="fa fa-thumbs-o-up"></i>');
            $('#a_DL_'+id).val(response.dislike);
            $('#a_L_'+id).val(response.like);
            }
        });
        }
        
     }
     function increase_like_comment(id)
     {
        var ses_id = "{{Session::get('id')}}";
        if(ses_id == '')
        {
            $('#login_please_comment_'+id).fadeIn(800);
            $('#login_please_comment_'+id).fadeOut(1300);
            //window.location.replace('/login');
        }
        else
        {
            var comment_id = id;
        //alert(article_id);
            $.ajax({
            type: 'POST',
            url: "{{ route('comment_like_increase') }}",
            data: {id: comment_id, _token: "{{ csrf_token() }}"},
            success: function (response){
            $('#like_name_comment_'+id).text('LIKES:');
            $('#dislike_name_comment_'+id).text('DISLIKES:');
            $('#comment_div_like_'+id).html(response.like);
            $('#comment_div_dislike_'+id).html(response.dislike);
            if($('#c_L_'+id).val() < response.like)
            {
               $('#comment-like-' + id).html('<i class="fa fa-thumbs-up"></i>');
               $('#user_choice_comment_like_'+id).text('You liked this comment!');
               $('#user_choice_comment_like_'+id).fadeIn(900);
               $('#user_choice_comment_like_'+id).fadeOut(3000);
            }
            else
            {
               $('#comment-like-' + id).html('<i class="fa fa-thumbs-o-up"></i>');
            }
            $('#comment-dislike-' + id).html('<i class="fa fa-thumbs-o-down"></i>');
            $('#c_DL_'+id).val(response.dislike);
            $('#c_L_'+id).val(response.like);
            }
        });

        }
     }
     function decrease_like_comment(id)
     {
        var ses_id = "{{Session::get('id')}}";
        if(ses_id == '')
        {
            $('#login_please_comment_'+id).fadeIn(800);
            $('#login_please_comment_'+id).fadeOut(1300);
            //window.location.replace('/login');
        }
        else
        {
            var comment_id = id;
            $.ajax({
            type: 'POST',
            url: "{{ route('comment_like_decrease') }}",
            data: {id: comment_id, _token: "{{ csrf_token() }}"},
            success: function (response){

            $('#like_name_comment_'+id).text('LIKES:');
            $('#dislike_name_comment_'+id).text('DISLIKES:');
            $('#comment_div_like_'+id).html(response.like);
            $('#comment_div_dislike_'+id).html(response.dislike);
            if($('#c_DL_'+id).val() < response.dislike)
            {
               $('#comment-dislike-' + id).html('<i class="fa fa-thumbs-down"></i>');
               $('#user_choice_comment_dislike_'+id).text('You disliked this comment!');
               $('#user_choice_comment_dislike_'+id).fadeIn(900);
               $('#user_choice_comment_dislike_'+id).fadeOut(3000);
            }
            else
            {
               $('#comment-dislike-' + id).html('<i class="fa fa-thumbs-o-down"></i>');
               $('#user_choice_comment_'+id).text('');
            }
            $('#comment-like-' + id).html('<i class="fa fa-thumbs-o-up"></i>');
            $('#c_DL_'+id).val(response.dislike);
            $('#c_L_'+id).val(response.like);
            }
        });
        }
     }
     function increase_like_reply(id)
     {
        var ses_id = "{{Session::get('id')}}";
        if(ses_id == '')
        {
            $('#login_please_reply_'+id).fadeIn(800);
            $('#login_please_reply_'+id).fadeOut(1300);
            //window.location.replace('/login');
        }
        else
        {
            var reply_id = id;
        //alert(article_id);
            $.ajax({
            type: 'POST',
            url: "{{ route('reply_like_increase') }}",
            data: {id: reply_id, _token: "{{ csrf_token() }}"},
            success: function (response){

            $('#like_name_reply_'+id).text('LIKES:');
            $('#dislike_name_reply_'+id).text('DISLIKES:');
            $('#reply_div_like_'+id).html(response.like);
            $('#reply_div_dislike_'+id).html(response.dislike);
            if($('#r_L_'+id).val() < response.like)
            {
               $('#reply-like-' + id).html('<i class="fa fa-thumbs-up"></i>');
               $('#user_choice_reply_like_'+id).text('You liked this reply!');
               $('#user_choice_reply_like_'+id).fadeIn(900);
               $('#user_choice_reply_like_'+id).fadeOut(3000);
            }
            else
            {
               $('#reply-like-' + id).html('<i class="fa fa-thumbs-o-up"></i>');
               $('#user_choice_reply_'+id).text('');
            }
            $('#reply-dislike-' + id).html('<i class="fa fa-thumbs-o-down"></i>');
            $('#r_DL_'+id).val(response.dislike);
            $('#r_L_'+id).val(response.like);
            }
        });
        }
     }
     function decrease_like_reply(id)
     {
        var ses_id = "{{Session::get('id')}}";
        if(ses_id == '')
        {
            $('#login_please_reply_'+id).fadeIn(800);
            $('#login_please_reply_'+id).fadeOut(1300);
            //window.location.replace('/login');
        }
        else
        {
            var reply_id = id;
        //alert(article_id);
        $.ajax({
            type: 'POST',
            url: "{{ route('reply_like_decrease') }}",
            data: {id: reply_id, _token: "{{ csrf_token() }}"},
            success: function (response){

             $('#like_name_reply_'+id).text('LIKES:');
            $('#dislike_name_reply_'+id).text('DISLIKES:');
            $('#reply_div_like_'+id).html(response.like);
            $('#reply_div_dislike_'+id).html(response.dislike);
            if($('#r_DL_'+id).val() < response.dislike)
            {
               $('#reply-dislike-' + id).html('<i class="fa fa-thumbs-down"></i>');
               //$('#user_choice_reply_'+id).text('you disliked this!');
               $('#user_choice_reply_dislike_'+id).text('You disliked this reply!');
               $('#user_choice_reply_dislike_'+id).fadeIn(900);
               $('#user_choice_reply_dislike_'+id).fadeOut(3000);
            }
            else
            {
               $('#reply-dislike-' + id).html('<i class="fa fa-thumbs-o-down"></i>');
               $('#user_choice_reply_'+id).text('');
            }
            $('#reply-like-' + id).html('<i class="fa fa-thumbs-o-up"></i>');
            $('#r_DL_'+id).val(response.dislike);
            $('#r_L_'+id).val(response.like);
            }
        });
        }
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
                //alert(1);
                console.log(response);
                $('#comment-body-edit-id-'+id).hide();
                $('#comment-body-material-'+id).html(response);
                $('#comment-body-material-'+id).show();
        }

        });
    }
    function cancelbtn_com(id)
    {
    
        var commentText = $('#comment_body_'+id).val();
        var commentId   = $('#comment_id_'+id).val();
        alert(commentId);
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

    function hover_like_a(id)//for article section
    {
        var article_id = id;
        //alert('came');
        $.ajax({
            type: 'POST',
            url: "{{ route('show_modal') }}",
            data: {id: article_id},
            success: function (response){
               //console.log(response);
               totaldiv = "";
               if(response.status)
               {
                    for(i=0;i<response.response.length;i++)
                    {

                        currentObj = response.response[i];
                        var now_user=currentObj.user.id.toString();
                       //alert(now_user);
                        totaldiv += "<tr><td><img class='media-object' src='/uploads/profile_pic/"+currentObj.user.profile_picture+"'' style='width:35px; height:35px; float:left; border-radius:0%; margin-right:25px; '></td><td><a href='{{route('user_profile_show')}}"+"/"+currentObj.user.id+"'>"+currentObj.user.first_name+" "+currentObj.user.last_name+"</a></td></tr>"
                    }
                    $('#likearticleList_'+id).empty(); 
                    $('#likearticleList_'+id).append(totaldiv); 
               }
               else
               {
                    //alert(response.msg);
                    totaldiv += "<tr><td>"+response.message+"</td></tr>"
                    $('#likearticleList_'+id).empty(); 
                    $('#likearticleList_'+id).append(totaldiv);
               }
                

            }

    
        });
        $("#myModal_like_"+id).fadeIn(500);
    }
    function hover_dislike_a(id)
    {
        var article_id = id;
        //alert('came');
        $.ajax({
            type: 'POST',
            url: "{{ route('show_modal_dislike_article') }}",
            data: {id: article_id},
            success: function (response){
               //console.log(response);
               totaldiv = "";
               if(response.status)
               {
                    //console.log(response.response.length);
                    
                    for(i=0;i<response.response.length;i++)
                    {
                        currentObj = response.response[i];
                        var now_user=currentObj.user.id.toString();
                        totaldiv += "<tr><td><img class='media-object' src='/uploads/profile_pic/"+currentObj.user.profile_picture+"'' style='width:35px; height:35px; float:left; border-radius:0%; margin-right:25px; '></td><td><a href='{{route('user_profile_show')}}"+"/"+currentObj.user.id+"'>"+currentObj.user.first_name+" "+currentObj.user.last_name+"</a></td></tr>"
                    }
                    $('#dislikearticleList_'+id).empty(); 
                    $('#dislikearticleList_'+id).append(totaldiv); 
               }
               else
               {
                    //alert(response.msg);
                    $('#dislikearticleList_'+id).empty(); 
                    totaldiv += "<tr><td>"+response.message+"</td></tr>"
                    $('#dislikearticleList_'+id).append(totaldiv); 
               }
            }

    
        });
        $("#myModal_dislike_"+id).fadeIn(500);
    }
    function hover_view_a(id)
    {

        var article_id = id;
        //alert('came');
        $.ajax({
            type: 'POST',
            url: "{{ route('show_modal_view_article') }}",
            data: {id: article_id },
            success: function (response){
               console.log(response);
               totaldiv = "";
               if(response.status)
               {
                    //console.log(response.response.length);    
                    for(i=0;i<response.response.length;i++)
                    {
                        currentObj = response.response[i];
                        var now_user=currentObj.user.id.toString();
                        totaldiv += "<tr><td><img class='media-object' src='/uploads/profile_pic/"+currentObj.user.profile_picture+"'' style='width:35px; height:35px; float:left; border-radius:0%; margin-right:25px; '></td><td><a href='{{route('user_profile_show')}}"+"/"+currentObj.user.id+"'>"+currentObj.user.first_name+" "+currentObj.user.last_name+"</a></td></tr>"
                    }
                    $('#viewarticleList_'+id).empty();
                    $('#viewarticleList_'+id).append(totaldiv); 
               }
               else
               {
                    //alert(response.msg);
                    totaldiv += "<tr><td>"+response.message+"</td></tr>"
                    $('#viewarticleList_'+id).empty();
                    $('#viewarticleList_'+id).append(totaldiv);
               }
            }

    
        });
        $("#myModal_view_"+id).fadeIn(500);
    }
    function hover_like_a_close(id)
    {
        $("#myModal_like_"+id).fadeOut(100);
    }
    function hover_dislike_a_close(id)
    {
        $("#myModal_dislike_"+id).fadeOut(100);
    }
    function hover_view_a_close(id)
    {
        $("#myModal_view_"+id).fadeOut(100);
    }


    function hover_like_c(id)//for comment section
    {
        var comment_id = id;
        //alert('came');
        $.ajax({
            type: 'POST',
            url: "{{ route('show_modal_like_comment') }}",
            data: {id: comment_id},
            success: function (response){
               //console.log(response);
               totaldiv = "";
               if(response.status)
               {
                    //console.log(response.response.length);
                    
                    for(i=0;i<response.response.length;i++)
                    {
                        currentObj = response.response[i];
                        var now_user=currentObj.user.id.toString();
                        totaldiv += "<tr><td><img class='media-object' src='/uploads/profile_pic/"+currentObj.user.profile_picture+"'' style='width:35px; height:35px; float:left; border-radius:0%; margin-right:25px; '></td><td><a href='{{route('user_profile_show')}}"+"/"+currentObj.user.id+"'>"+currentObj.user.first_name+" "+currentObj.user.last_name+"</a></td></tr>"
                    }
                    $("#commentlikeList_"+id).empty();
                    $("#commentlikeList_"+id).append(totaldiv);
               }
               else
               {

                    $("#commentlikeList_"+id).empty();
                    totaldiv += "<tr><td>"+response.message+"</td></tr>"
                    $("#commentlikeList_"+id).append(totaldiv);
               }
            }
        });
        $("#myModal_like_c_"+id).fadeIn(500);
    }

    function hover_dislike_c(id)
    {
        var comment_id = id;
        //alert('came');
        $.ajax({
            type: 'POST',
            url: "{{ route('show_modal_dislike_comment') }}",
            data: {id: comment_id},
            success: function (response){
               //console.log(response);
                totaldiv = "";
               if(response.status)
               {
                    //console.log(response.response.length);
                    totaldiv = "";
                    for(i=0;i<response.response.length;i++)
                    {
                        currentObj = response.response[i];
                        var now_user=currentObj.user.id.toString();
                        totaldiv += "<tr><td><img class='media-object' src='/uploads/profile_pic/"+currentObj.user.profile_picture+"'' style='width:35px; height:35px; float:left; border-radius:0%; margin-right:25px; '></td><td><a href='{{route('user_profile_show')}}"+"/"+currentObj.user.id+"'>"+currentObj.user.first_name+" "+currentObj.user.last_name+"</a></td></tr>"
                    }
                    $("#commentdislikeList_"+id).empty();
                    $("#commentdislikeList_"+id).append(totaldiv);
               }
               else
               {
                    //alert(response.msg);
                    $("#commentdislikeList_"+id).empty();
                    totaldiv += "<tr><td>"+response.message+"</td></tr>"
                    $("#commentdislikeList_"+id).append(totaldiv);
               }
            }
        });
        $("#myModal_dislike_c_"+id).fadeIn(500);
    }
    function hover_like_c_close(id)
    {
        $("#myModal_like_c_"+id).fadeOut(100);
    }
    function hover_dislike_c_close(id)
    {
        $("#myModal_dislike_c_"+id).fadeOut(100);
    }

    function hover_like_r(id)//for comment section
    {
        var reply_id = id;
        //alert('came');
        $.ajax({
            type: 'POST',
            url: "{{ route('show_modal_like_reply') }}",
            data: {id: reply_id},
            success: function (response){
               //console.log(response);
               totaldiv = "";
               if(response.status)
               {
                    //console.log(response.response.length);
                    
                    for(i=0;i<response.response.length;i++)
                    {
                        currentObj = response.response[i];
                        var now_user=currentObj.user.id.toString();
                        totaldiv += "<tr><td><img class='media-object' src='/uploads/profile_pic/"+currentObj.user.profile_picture+"'' style='width:35px; height:35px; float:left; border-radius:0%; margin-right:25px; '></td><td><a href='{{route('user_profile_show')}}"+"/"+currentObj.user.id+"'>"+currentObj.user.first_name+" "+currentObj.user.last_name+"</a></td></tr>"
                    }
                    $("#replylikeList_"+id).empty();
                    $("#replylikeList_"+id).append(totaldiv); 
               }
               else
               {
                    //alert(response.msg);
                    $("#replylikeList_"+id).empty();
                    totaldiv += "<tr><td>"+response.message+"</td></tr>"
                    $("#replylikeList_"+id).append(totaldiv);

               }
            }
        });
        $("#myModal_like_r_"+id).fadeIn(500);
    }
    function hover_dislike_r(id)
    {
        var reply_id = id;
        //alert('came');
        $.ajax({
            type: 'POST',
            url: "{{ route('show_modal_dislike_reply') }}",
            data: {id: reply_id},
            success: function (response){
               //console.log(response);
               totaldiv = "";
               if(response.status)
               {
                    //console.log(response.response.length);
                    
                    for(i=0;i<response.response.length;i++)
                    {
                        currentObj = response.response[i];
                        var now_user=currentObj.user.id.toString();
                        totaldiv += "<tr><td><img class='media-object' src='/uploads/profile_pic/"+currentObj.user.profile_picture+"'' style='width:35px; height:35px; float:left; border-radius:0%; margin-right:25px; '></td><td><a href='{{route('user_profile_show')}}"+"/"+currentObj.user.id+"'>"+currentObj.user.first_name+" "+currentObj.user.last_name+"</a></td></tr>"
                    }
                    $("#replydislikeList_"+id).empty(); 
                    $("#replydislikeList_"+id).append(totaldiv); 
               }
               else
               {
                    //alert(response.message);
                    totaldiv += "<tr><td>"+response.message+"</td></tr>"
                    $("#replydislikeList_"+id).empty(); 
                    $("#replydislikeList_"+id).append(totaldiv);

               }
            }
        });
        $("#myModal_dislike_r_"+id).fadeIn(500);
    }
    function hover_like_r_close(id)
    {
        $("#myModal_like_r_"+id).fadeOut(100);
    }
    function hover_dislike_r_close(id)
    {
        $("#myModal_dislike_r_"+id).fadeOut(100);
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
        <hr> @include('layouts.fbshare_')<br>
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


            <!-- start -->
            <div class="row col-md-12 social-actions" id="article_div_{{$article->id}}">

            <div class='col-md-3' id="likes_section_{{$article->id}}">
                
                
                      <form action="#" method="POST" id="article_like_form_{{$article->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <button type="button" id="article-like-{{$article->id}}" onclick="increase_like_article('{{$article->id}}')" class="btn btn-xs" style="color: #337AB7">
                        @if($article->like->where('user_id',Session::get('id'))->where('article_id',$article->id)->first()!=null)
                        <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                        @else
                        <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                        @endif
                        </button>
                        <span  id="like_name_article_{{$article->id}}"> LIKES:</span>
                         <span type="button" onclick="hover_like_a('{{$article->id}}')" id="article_div_like_{{$article->id}}">{{ $article->likes }} </span>
                         <input type="hidden" id="a_L_{{$article->id}}" value="{{ $article->likes }}" >
                    </form> 
            </div>
                        
                       
               <div class='col-md-3' id="dislikes_section_{{$article->id}}">
                     <form action="#" method="POST" id="article_dislike_form_{{$article->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="button" id="article-dislike-{{$article->id}}" onclick="decrease_like_article('{{$article->id}}')" class="btn btn-xs" style="color: #337AB7">
                        @if($article->dislike->where('user_id',Session::get('id'))->where('article_id',$article->id)->first() !=null)
                            <i class="fa fa-thumbs-down"></i>
                        @else
                            <i class="fa fa-thumbs-o-down"></i>
                        @endif
                        </button>
                        <span id="dislike_name_article_{{$article->id}}">DISLIKES:</span>
                        <span type="button" onclick="hover_dislike_a('{{$article->id}}')" id="article_div_dislike_{{$article->id}}">{{ $article->dislikes }}</span>
                        <input type="hidden" id="a_DL_{{$article->id}}" value="{{ $article->dislikes }}" >
                    </form> 
               </div>
                  
                <div class='col-md-2'>
                    <small>
                        <i type="button"  onclick="hover_view_a('{{$article->id}}')" class="fa fa-binoculars fa-border"></i> 
                        <span id="view_name_article_{{$article->id}}">VIEWS:</span>
                        <span id="article_view_{{$article->id}}">{{ $article->views }}</span>

                        <input type="hidden" id="a_V_{{$article->id}}" value="{{ $article->dislikes }}" >
                    </small>
                </div>

                <div class='col-md-3'>
                        <span style="display:none; color:green;" id="user_choice_article_like_{{$article->id}}"></span>
                        <span style="display:none; color:#4F0826; " id="user_choice_article_dislike_{{$article->id}}"></span>
                        <h5 style="display:none; color:#4F0826;" id="login_please_article">PLEASE LOGIN..!!</h5>
                </div>
             </div>
            <?php $people_liked_article =       $article->like; 
            $people_disliked_article =    $article->dislike;
            $people_viewed_article   =    $article->view; ?>

             <div class="modal" id="myModal_like_{{$article->id}}" role="dialog" >
                <div class="modal-dialog">
    
                <!-- Modal content-->
                <div class="modal-content col-md-8 " style="height: 300px; overflow-y: auto;">
                    <div class="modal-header">
                        <button type="button" onclick="hover_like_a_close('{{$article->id}}')" id="myModal_like_close_{{$article->id}}" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">People who liked..</h4>
                    </div>
                                <table class="table">
    
                                    <tbody id="likearticleList_{{$article->id}}">
                                      
                                    </tbody>
                                  </table>
                                
                    </div>
      
                </div>
            </div> 

            <div class="modal" id="myModal_dislike_{{$article->id}}" role="dialog" >
                <div class="modal-dialog">
    
                <!-- Modal content-->
                <div class="modal-content col-md-8 " style="height: 300px; overflow-y: auto;">
                    <div class="modal-header">
                        <button type="button" onclick="hover_dislike_a_close('{{$article->id}}')" id="myModal_dislike_close_{{$article->id}}" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">People who disliked..</h4>
                    </div>
                                <table class="table">
    
                                    <tbody id="dislikearticleList_{{$article->id}}">
                                      
                                    </tbody>
                                  </table>
                                
                    </div>
      
                </div>
            </div> 

             <div class="modal" id="myModal_view_{{$article->id}}" role="dialog" >
                <div class="modal-dialog">
    
                <!-- Modal content-->
                <div class="modal-content col-md-8 " style="height: 300px; overflow-y: auto;">
                    <div class="modal-header">
                        <button type="button" onclick="hover_view_a_close('{{$article->id}}')" id="myModal_view_close_{{$article->id}}" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">People who viewed..</h4>
                    </div>
                                <table class="table">
    
                                    <tbody id="viewarticleList_{{$article->id}}">
                                      
                                    </tbody>
                                  </table>
                                
                    </div>
      
                </div>
            </div>  
             <!-- end -->   
        <hr>
       </p>



        @foreach($article->comment as $comment)
        <hr>
        <div class="media">
            <div id="this_comment_id_{{$comment->id}}">
                <a class="pull-left" href="#">
                    <img class="media-object" src="/uploads/profile_pic/{{$comment->user->profile_picture }}" style="width:65px; height:65px; float:left; border-radius:150%; margin-right:25px; ">
                </a>
            <div class="media-body">
                <h4 class="media-heading">{{ $comment->user->first_name }}{{' '}}{{ $comment->user->last_name }} <small>{{ $comment->created_at }}</small>
                
                    
                    
                    <div class="col-md-12 social-actions">
                        
                         

                        <div class="col-md-2">
                            <form action="#" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="button" id="comment-like-{{$comment->id}}" onclick="increase_like_comment('{{$comment->id}}')" class="btn btn-xs" style="color: #337AB7">
                                @if($comment->like->where('user_id',Session::get('id'))->where('comment_id',$comment->id)->first()!=null)
                                    <i class="fa fa-thumbs-up"></i>
                                @else
                                    <i class="fa fa-thumbs-o-up"></i>
                                @endif
                                </button>
                                 <span id="like_name_comment_{{$comment->id}}"> LIKES:</span>
                                 <span type="button" onclick="hover_like_c('{{$comment->id}}')" id="comment_div_like_{{$comment->id}}">{{ $comment->likes }} </span>
                                 <input type="hidden" id="c_L_{{$comment->id}}" value="{{ $comment->likes }}" >
                            </form>   
                        </div>                         
                    
                        <div class="col-md-3">
                            <form action="#" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="button" id="comment-dislike-{{$comment->id}}" onclick="decrease_like_comment('{{$comment->id}}')" class="btn btn-xs" style="color: #337AB7">
                                @if($comment->dislike->where('user_id',Session::get('id'))->where('comment_id',$comment->id)->first()!=null)
                                    <i class="fa fa-thumbs-down"></i>
                                @else
                                    <i class="fa fa-thumbs-o-down"></i>
                                @endif
                                </button>
                                <span id="dislike_name_comment_{{$comment->id}}"> DISLIKES:</span>
                                <span onclick="hover_dislike_c('{{$comment->id}}')" id="comment_div_dislike_{{$comment->id}}">{{ $comment->dislikes }} </span>
                                <input type="hidden" id="c_DL_{{$comment->id}}" value="{{ $comment->dislikes }}" >
                            </form>
                        </div>
                        
                        <div class='col-md-3'>
                    
                            <span style="display:none; color:green;" id="user_choice_comment_like_{{$comment->id}}"></span>
                            <span style="display:none; color:#4F0826;" id="user_choice_comment_dislike_{{$comment->id}}"></span>
                            <span style="display:none; color:#4F0836;" id="user_choice_comment_login_{{$comment->id}}"> PLEASE LOGIN!!</span>
                            <span style="display:none; color:#4F0826;" id="login_please_comment_{{$comment->id}}" > PLEASE LOGIN..!! </span>
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

                    <div class="modal" id="myModal_like_c_{{$comment->id}}" role="dialog" >
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content col-md-8 " style="height: 300px; overflow-y: auto;">
                                <div class="modal-header">
                                    <button type="button" onclick="hover_like_c_close('{{$comment->id}}')" id="myModal_like_comment_close_{{$article->id}}" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">People who liked comment..</h4>
                                </div>
                                <table class="table">
                                    <tbody id="commentlikeList_{{$comment->id}}">  
                                    </tbody>
                                </table>           
                            </div>
                        </div>
                    </div> 

                    <div class="modal" id="myModal_dislike_c_{{$comment->id}}" role="dialog" >
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content col-md-8 " style="height: 300px; overflow-y: auto;">
                                <div class="modal-header">
                                    <button type="button" onclick="hover_dislike_c_close('{{$comment->id}}')" id="myModal_dislike_comment_close_{{$article->id}}" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">People who disliked comment..</h4>
                                </div>
                                <table class="table">
                                    <tbody id="commentdislikeList_{{$comment->id}}">  
                                    </tbody>
                                </table>           
                            </div>
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
                                <form action="#" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="button" id="reply-like-{{$reply->id}}" onclick="increase_like_reply('{{$reply->id}}')" class="btn btn-xs" style="color: #337AB7">
                                @if($reply->like->where('user_id',Session::get('id'))->where('reply_id',$reply->id)->first() != null)
                                    <i class="fa fa-thumbs-up"></i>
                                @else
                                    <i class="fa fa-thumbs-o-up"></i>
                                @endif
                                </button>
                                <span id="like_name_reply_{{$reply->id}}"> LIKES:</span>
                                 <span onclick="hover_like_r('{{$reply->id}}')" id="reply_div_like_{{$reply->id}}">{{ $reply->likes }} </span>
                                 <input type="hidden" id="r_L_{{$reply->id}}" value="{{ $reply->likes }}" >
                                </form>  
                            </div>

                            <div class="col-md-4 social-actions">
                                <form action="#" method="POST">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button type="button" id="reply-dislike-{{$reply->id}}" onclick="decrease_like_reply('{{$reply->id}}')" class="btn btn-xs" style="color: #337AB7">
                                @if($reply->dislike->where('user_id',Session::get('id'))->where('reply_id',$reply->id)->first() != null)
                                    <i class="fa fa-thumbs-down"></i>
                                @else
                                    <i class="fa fa-thumbs-o-down"></i>
                                @endif
                                </button>
                                <span id="dislike_name_reply_{{$reply->id}}"> DISLIKES:</span>
                                <span onclick="hover_dislike_r('{{$reply->id}}')" id="reply_div_dislike_{{$reply->id}}">{{ $reply->dislikes }} </span>
                                <input type="hidden" id="r_DL_{{$reply->id}}" value="{{ $reply->dislikes }}" >    
                                </form>
                            </div>

                            <div class='col-md-3'>
                            <span style="display:none; color:green;" id="user_choice_reply_like_{{$reply->id}}"></span>
                            <span style="display:none; color:#4F0826;" id="user_choice_reply_dislike_{{$reply->id}}"></span>
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

                                    <h5 id="login_please_reply_{{$reply->id}}" style="display:none; color:#4F0826;">login to continue..!!</h5>
                                </div>
                            </div>

                            <div class="modal" id="myModal_like_r_{{$reply->id}}" role="dialog" >
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content col-md-8 " style="height: 300px; overflow-y: auto;">
                                        <div class="modal-header">
                                            <button type="button" onclick="hover_like_r_close('{{$reply->id}}')" id="myModal_like_reply_close_{{$reply->id}}" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">People who liked reply..</h4>
                                        </div>
                                        <table class="table">
                                            <tbody id="replylikeList_{{$reply->id}}">  
                                            </tbody>
                                        </table>           
                                    </div>
                                </div>
                            </div> 

                            <div class="modal" id="myModal_dislike_r_{{$reply->id}}" role="dialog" >
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content col-md-8 " style="height: 300px; overflow-y: auto;">
                                        <div class="modal-header">
                                            <button type="button" onclick="hover_dislike_r_close('{{$reply->id}}')" id="myModal_dislike_reply_close_{{$reply->id}}" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">People who disliked reply..</h4>
                                        </div>
                                        <table class="table">
                                            <tbody id="replydislikeList_{{$reply->id}}">  
                                            </tbody>
                                        </table>           
                                    </div>
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
                </div>
                @endforeach
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
            
            <!------------------------- -->
            <hr>
             </div>
              </div>
        </div>
             <hr>
        @endforeach
        
        <div class="well"  id="CommentBox_{{$article->id}}">
            <h4>Leave a Comment:</h4>
            <form role="form" method="POST"  action="/comment">
                <div class="form-group">
                    <textarea type="input" id="new_comment_body" name="comment_body" class="form-control" rows="3"></textarea>
                </div>
                <input type="hidden" name="article_id" value="{{ $article->id }}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-primary pull-right">Comment</button>
                <br />
            </form>
        </div>
       
        
   
@endsection
