@extends('layouts.app')

@section('title')
User registration
@endsection

@section('content')
    <div class="clearfix" style="margin-top:50px;">
        <div class="progress">
            <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="well well-sm">
                    <form class="form-horizontal" method="post" action="{{route('postregister')}}" id="registrationform" enctype="multipart/form-data">
<fieldset class="section" id="sec-1" >
<legend class="text-center header">Register Step-1 of 3</legend>
<div class="form-group">
<label for="user_email" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="row">
<input type="email" class="form-control col-md-6 col-sm-6 col-xs-12" id="user_email" value="{{old('email')}}" name="email" placeholder="Email"/>
</div>
@if ($errors->any()) <div style="color:red">{{$errors->first('email')}}</div>@endif
</div>
</div>
<div class="form-group">
<label for="user_password" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="row">
<input type="password" class="form-control col-md-6 col-sm-6 col-xs-12" id="user_password" name="password" placeholder="Password" />
@if ($errors->any()) <div style="color:red">{{$errors->first('password')}}</div>@endif
</div>
</div>
</div>

<div class="form-group">
<label for="user_confirmpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="row">
<input type="password" class="form-control col-md-6 col-sm-6 col-xs-12" id="user_Confirmepassword" name="confirm_password" placeholder="Re-enter Password" />
@if ($errors->any()) <div style="color:red">{{$errors->first('confirm_password')}}</div>@endif

</div>
</div>
</div>
<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token()}}"/>

<div class="form-group">
<div class="co-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
<input onclick="showSection(2);" type="button" name="next" class="next btn btn-info pull-right" value="Next" />
</div>
</div>
</fieldset>

<fieldset class="section" id="sec-2" >
<legend class="text-center header">Register Step-2 of 3</legend>
<div class="form-group">
<label for="user_fname" class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
<div class="col-md-6 col-sm-7 col-xs-12">
<div class="row">
<div class="col-sm-6 form-group">
<input type="text" class="form-control col-md-6 col-sm-6 col-xs-12" value="{{old('first_name')}}" id="user_fname" name="first_name" placeholder="First Name" />
@if ($errors->any()) <div style="color:red">{{$errors->first('first_name')}}</div>@endif
</div>
<div class="col-sm-6 form-group">
<input type="text" class="form-control col-md-6 col-sm-6 col-xs-12" id="user_lname" value="{{old('last_name')}}" name="last_name" placeholder="Last Name" />
@if ($errors->any()) <div style="color:red">{{$errors->first('last_name')}}</div>@endif
</div>

<div class="form-group">
<div class="co-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
<input onclick="showSection(1);" type="button" name="previous" class="previous btn btn-default pull-left" value="previous" id="previous" />
<input onclick="showSection(3);" type="button" name="next" class="next btn btn-info pull-right" value="Next" />
</div>
</div>
</fieldset>

<fieldset class="section" id="sec-3" >
<legend class="text-center header">Register Step-3 of 3 (Optional fields)</legend>
<div class="form-group">
<label for="dateofbirth" class="control-label col-md-3 col-sm-3 col-xs-12">Date of Birth</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="row">
<input type="text" class="form-control col-md-6 col-sm-6 col-xs-12" value="{{old('date_of_birth')}}" name="date_of_birth" id="dateofbirth" placeholder="yyyy/mm/dd" />
@if ($errors->any()) <div style="color:red">{{$errors->first('date_of_birth')}}</div>@endif
</div>
</div>
</div>

<div class="form-group">
<label for="country" class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="row">
<!-- country codes (ISO 3166) and Dial codes. -->
<select name="country" id="country" class="form-control col-md-6 col-sm-6 col-xs-12">
<option value="">-- Select --</option>
@foreach($countries as $country)

<option value="{{$country->id}}">{{$country->name}}</option>
@endforeach

</select>
@if ($errors->any()) <div style="color:red">{{$errors->first('country')}}</div>@endif
</div>
</div>
</div>
<div class="form-group">
<label for="user_contactno" class="control-label col-md-3 col-sm-3 col-xs-12">Contact No</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="row">
<input type="text" class="form-control col-md-6 col-sm-6 col-xs-12" value="{{old('contact_no')}}" id="user_contactno" name="contact_no" placeholder="Contact No"/>
@if ($errors->any()) <div style="color:red">{{$errors->first('contact_no')}}</div>@endif
</div>
</div>
</div>
<div class="form-group">
<label for="user_profilepicture" class="control-label col-md-3 col-sm-3 col-xs-12">Profile Picture</label>
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="row">
<input type="file" class="form-control col-md-6 col-sm-6 col-xs-12" id="user_profilepicture" name="profile_picture"/>
@if ($errors->any()) <div style="color:red">{{$errors->first('profile_picture')}}</div>@endif
</div>
</div>
</div>
<div class="form-group">
<div class="co-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
<input onclick="showSection(2);" type="button" name="previous" class="previous btn btn-default pull-left" value="previous" id="previous" />
<input type="submit" name="submit" class="submit btn btn-success pull-right" value="Submit" />
</div>
</div>
</fieldset>

</form>
<div id="pswd_info">
<h4>Password must meet the following requirements:</h4>
<ul>
<li id="smaller" class="invalid">At least <strong>one smaller letter</strong></li>
<li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
<li id="number" class="invalid">At least <strong>one number</strong></li>
<li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
</ul>
</div>
<div id="cpswd_info">
<strong id="cpswd" class="invalid">password & confirm Password Should be match</strong>
</div>
</div>
</div>
</div>
</div>
<script>
function showSection(id){
$('.section').hide();
$('#sec-'+id).show();
}
showSection(1);
$('input[name=date_of_birth]').datepicker({ dateFormat: 'yy/mm/dd',changeMonth: true,changeYear: true,yearRange: '1950:Date'});
</script>
@endsection

@section('script')
<script src="http://code.jquery.com/jquery-1.7.min.js"></script>;
<script src="js/registration.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">;
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>;
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>;
@endsection