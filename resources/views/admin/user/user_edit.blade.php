@extends('layouts.admin')
@section('content')
    <div class="contaner">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User Management</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <form action="{{ URL::to('admin/user/edit/'.$user->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PATCH">
                            <legend>Edit user</legend>
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
                                <label for="dateofbirth" class="control-label col-md-3 col-sm-3 col-xs-12">Date of Birth</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="row">
                                        <input type="text" class="form-control col-md-6 col-sm-6 col-xs-12" value="{{$user->date_of_birth}}"  name="date_of_birth" id="dateofbirth" placeholder="yyyy/mm/dd" />
                                        @if ($errors->any()) <div style="color:red">{{$errors->first('date_of_birth')}}</div>@endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="country" class="control-label col-md-3 col-sm-3 col-xs-12">Country</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <div class="row">
                                        <!-- country codes (ISO 3166) and Dial codes. -->
                                        <select name="country_id" id="country" class="form-control col-md-6 col-sm-6 col-xs-12">
                                            <option value="{{$user->country_id}}">
                                                @if(count(App\Country::where('id','=',$user->country_id)->first())>0)
                                                    {{App\Country::where('id','=',$user->country_id)->first()->name}}
                                                @else
                                                    Not Selected
                                                @endif
                                            </option>

                                            @foreach($countries as $country)

                                                <option value="{{$country->id}}">{{$country->name}}</option>
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
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper --
    @endsection