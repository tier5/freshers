$(document).ready(function() {

    $('input[name=password]').keyup(function() {
        var pswd = $(this).val();
        if ( pswd.length < 8 ) {
            $('#length').removeClass('valid').addClass('invalid');
        } else {
            $('#length').removeClass('invalid').addClass('valid');
        }
        //validate letter
        if ( pswd.match(/[a-z]/) ) {
            $('#smaller').removeClass('invalid').addClass('valid');
        } else {
            $('#smaller').removeClass('valid').addClass('invalid');
        }

//validate capital letter
        if ( pswd.match(/[A-Z]/) ) {
            $('#capital').removeClass('invalid').addClass('valid');
        } else {
            $('#capital').removeClass('valid').addClass('invalid');
        }

//validate number
        if ( pswd.match(/\d/) ) {
            $('#number').removeClass('invalid').addClass('valid');
        } else {
            $('#number').removeClass('valid').addClass('invalid');
        }
    }).focus(function() {
        $('#pswd_info').show();
    }).blur(function() {
        $('#pswd_info').hide();
    })
    $('input[name=confirm_password]').keyup(function() {
        var pswd = $(this).val();
        var cpassword = $('#user_password').val();
        if ( pswd == cpassword) {
            $('#cpswd').removeClass('invalid').addClass('valid');
        }
        else {
            $('#cpswd').removeClass('valid').addClass('invalid');
        }

    }).focus(function() {
        $('#cpswd_info').show();
    }).blur(function() {
        $('#cpswd_info').hide();
    })



        var current = 1,current_step,next_step,steps;
        steps = $("fieldset").length;
        $(".next").click(function(){
            setProgressBar(++current);
        });
        $(".previous").click(function(){
            setProgressBar(--current);
        });
        setProgressBar(current);
        // Change progress bar action
        function setProgressBar(curStep){
            var percent = parseFloat(100 / steps) * curStep;
            percent = percent.toFixed();
            $(".progress-bar")
                .css("width",percent+"%")
                .html(percent+"%");
        }

});