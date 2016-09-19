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
        alert(commentId);
        $.ajax({
            type: 'POST',
        url: "{{ route('edit_comment_route') }}",
            data: {comment_body: commentText, _token: "{{ csrf_token() }}", comment_id: commentId, submit_stat: 1, cancel_stat:-1},
            success: function (response) {
                alert(1);
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
