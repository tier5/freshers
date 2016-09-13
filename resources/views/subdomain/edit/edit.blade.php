@extends('layouts.app')

@section('title')
    Manage your Subdomain
@endsection

@section('content')
    <div class="row">
    @if(Session::has('success'))
        <div class="co-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
            <p class="alert alert-warning">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{Session::get('success')}}
            </p>
        </div>
    @endif
</div>
    <div class="row">
    <div class="container ">
        <h1 class="panel-heading">Manage your Subdomain</h1>
    <form class="form-horizontal" role="form" method="POST" action="{{route('updatesubdomain')}}" enctype="multipart/form-data">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="user_subdomain" class="control-label col-md-3 col-sm-3 col-xs-12">Your Subdomain</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <input name="subdomain" {{$sub->is_edit?'disabled':''}} id="user_subdomain" value="{{$sub->subdomain}}" class="form-control col-md-3 col-sm-3 col-xs-6" />
                    @if($sub->is_edit == 0)<div style="color: #00A6C7"> You are only able to edit your Subdomain for onetime</div>@endif
                    <div id='subdomain_availability_result'></div>
                @if ($errors->any()) <div style="color:red">{{$errors->first('subdomain')}}</div>@endif
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="theme" class="control-label col-md-3 col-sm-3 col-xs-12">Select a Theme</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <label class="radio-inline">
                        <input type="radio" name="theme" id="theme" value=1 checked="checked" >
                       Theme 1
                        <div class="row"><img src="/themes/1.jpg" height=125px width=125px  /></div>
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="theme" id="theme" value=2>
                        Theme 2
                        <div class="row"><img src="/themes/2.jpg" height=125px width=125px /></div>
                    </label>

                    <label class="radio-inline">
                        <input type="radio" name="theme" id="theme" value=3>
                        Theme 3
                        <div class="row"><img src="/themes/3.jpg" height=125px width=125px  /></div>
                    </label>
                </div>
                @if ($errors->any()) <div style="color:red">{{$errors->first('theme')}}</div>@endif
            </div>
        </div>
        <div class="form-group">
            <label for="publish" class="control-label col-md-3 col-sm-3 col-xs-12">Publish</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <select name="publish" id="publish" class="form-control col-md-6 col-sm-6 col-xs-12">
                        <option value="{{$sub->publish}}" selected>---Select--</option>
                        <option value=1>Yes</option>
                        <option value=0>No</option>
                    </select>
                    @if ($errors->any()) <div style="color:red">{{$errors->first('publish')}}</div>@endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="co-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
                <button type="reset" class="btn btn-warning btn-md pull-left">Reset</button>
                <button type="submit" class="btn btn-success btn-md pull-right">Submit</button>
            </div>
        </div>

    </form>
    </div>
        </div>
    <script>

        $(document).ready(function() {

            //the min chars for username
            var min_chars = 3;

            //result texts
            var characters_error = 'Minimum amount of chars is 3';
            var checking_html = 'Checking...';

            //when button is clicked
            $('#user_subdomain').keyup(function(){
                //run the character number check
                if($('#user_subdomain').val().length < min_chars){
                    //if it's bellow the minimum show characters_error text '
                    $('#subdomain_availability_result').html(characters_error);
                }else{
                    //else show the cheking_text and run the function to check
                    $('#subdomain_availability_result').html(checking_html);

                    check_availability();
                }
            });

        });
        //function to check username availability
        function check_availability(){

            //get the username
            var subdomain = $('#user_subdomain').val();
            //use ajax to run the check
            var token = $('[name="csrf_token"]').attr('content');
            $.post("{{route('subdomaincheck')}}", { subdomain: subdomain, '_token':token},
                    function(response){
                        //if the result is 1
                        if(response.status == 'notexist'){
                            //show that the username is available
                            $('#subdomain_availability_result').css("color","blue").html('*  '+subdomain + '  is Available');
                        }else{
                            //show that the username is NOT available
                            $('#subdomain_availability_result').css("color","red").html('*  '+subdomain + '  is not Available');
                        }
                    });

        }
        $(function() {
            $('input').bind('focus', false);
        });
    </script>
@endsection