@extends('layouts.app')

@section('title')
    Update Profile
@endsection

@section('content')
    <div class="container">
        <form action="{{  route('updateprofile') }}" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PATCH">
            <legend>Update your profile  ({{$user->email}})</legend>
            <div class="form-group">
                <label for="user_fname" class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
                <div class="col-md-6 col-sm-7 col-xs-12">
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <input type="text" class="form-control col-md-6 col-sm-6 col-xs-12" id="user_fname" name="first_name" value="{{$user->first_name}}" placeholder="First Name" />
                            @if ($errors->any()) <div style="color:red">{{$errors->first('first_name')}}</div>@endif
                        </div>
                        <div class="col-sm-6 form-group">
                            <input type="text" class="form-control col-md-6 col-sm-6 col-xs-12" id="user_lname" name="last_name" value="{{$user->last_name}}" placeholder="Last Name" />
                            @if ($errors->any()) <div style="color:red">{{$errors->first('last_name')}}</div>@endif
                        </div>

                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="country" class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="row">
                        <!-- country codes (ISO 3166) and Dial codes. -->
                        <select name="country_id" id="country" class="form-control col-md-6 col-sm-6 col-xs-12">
                            <option value="{{$user->country_id}}">{{\App\Country::where('id','=',$user->country_id)->first()->name}}</option>
                            @foreach($countries as $country)

                                <option value="{{$user->country_id}}">{{$country->name}}</option>
                            @endforeach

                        </select>
                        @if ($errors->any()) <div style="color:red">{{$errors->first('country_id')}}</div>@endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="user_contactno" class="control-label col-md-3 col-sm-3 col-xs-12">Contact No</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="row">
                        <input type="number" class="form-control col-md-6 col-sm-6 col-xs-12" id="user_contactno" value="{{$user->contact_number}}" name="contact_number" placeholder="Contact Number"/>
                        @if ($errors->any()) <div style="color:red">{{$errors->first('contact_number')}}</div>@endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="user_profilepicture" class="control-label col-md-3 col-sm-3 col-xs-12">Update Profile Picture</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="row">
                        <input type="file" class="form-control col-md-6 col-sm-6 col-xs-12" id="user_profilepicture" name="profile_picture"/>
                        @if ($errors->any()) <div style="color:red">{{$errors->first('profile_picture')}}</div>@endif
                    </div>
                </div>
            </div>
            <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token()}}"/>

            <div class="form-group">
                <div class="co-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
                    <button type="reset" class="btn btn-warning btn-md pull-left">Reset</button>
                    <button type="submit" class="btn btn-success btn-md pull-right">Submit</button>
                </div>
            </div>

        </form>
    </div>
@endsection
