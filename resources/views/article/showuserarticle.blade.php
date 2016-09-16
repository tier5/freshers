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
</script>
<div class="container">
    
    @foreach($articles as $article)
 <hr>
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

             <hr>
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
       </p>
    </div>
    <hr>

 @endforeach

</div>
 @endsection
