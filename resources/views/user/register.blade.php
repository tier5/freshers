@extends('layouts.app')

@section('title')
    User registration
@endsection

@section('content')
    <div class="container">
    <form action="{{route('postregister')}}" method="POST" id="form" class="form-horizontal" role="form" enctype="multipart/form-data">
            <legend>Registration Form</legend>
        <div class="form-group">
            <label for="user_fname" class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                <div class="col-md-6 col-sm-7 col-xs-12">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input type="text" class="form-control col-md-6 col-sm-6 col-xs-12" id="user_fname" name="first_name" placeholder="First Name" />
                            @if ($errors->any()) <div style="color:red">{{$errors->first('first_name')}}</div>@endif
                        </div>
                        <div class="col-sm-6 form-group">
                            <input type="text" class="form-control col-md-6 col-sm-6 col-xs-12" id="user_lname" name="last_name" placeholder="Last Name" />
                            @if ($errors->any()) <div style="color:red">{{$errors->first('last_name')}}</div>@endif
                        </div>

                    </div>
                </div>
            </div>
        <div class="form-group">
            <label for="user_email" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <input type="email" class="form-control col-md-6 col-sm-6 col-xs-12" id="user_email" name="email" placeholder="Email" />
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
        <div class="form-group">
            <label for="dateofbirth" class="control-label col-md-3 col-sm-3 col-xs-12">Date of Birth</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <input type="text" class="form-control col-md-6 col-sm-6 col-xs-12" name="date_of_birth" id="dateofbirth" placeholder="yyyy/mm/dd" />
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
                    <input type="text" class="form-control col-md-6 col-sm-6 col-xs-12" id="user_contactno" name="contact_no" placeholder="Contact No"/>
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
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token()}}"/>

        <div class="form-group">
            <div class="co-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
                <button type="reset" class="btn btn-warning btn-md pull-left">Reset</button>
                <button type="submit" class="btn btn-success btn-md pull-right">Submit</button>
            </div>
        </div>


    </form>
    </div>

    <script type="text/javascript">
        $("document").ready(function() {
            $('#dateofbirth').datepicker({ dateFormat: 'yy/mm/dd',changeMonth: true,changeYear: true,yearRange: '1950:Date'})
        });
        </script>
@endsection

