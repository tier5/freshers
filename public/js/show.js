
jQuery(document).ready(function($)
{
	
	// $(".comment-butn").on("click",function(){
	// $(".comment-body").css("display","block");
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

});
