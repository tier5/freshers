@extends('layouts.app')

@section('title')
    Reset password
@endsection

@section('content')
    <form action="{{route('postreset')}}" method="POST" class="form-horizontal" role="form">
        <legend>Reset Password</legend>
        <div class="form-group">
            <label for="user_email" class="control-label col-md-3 col-sm-3 col-xs-12">Email</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <input type="email" class="form-control col-md-6 col-sm-6 col-xs-12" value={{$email}} id="user_email" name="email" placeholder="Email" readonly/>
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
            <label for="user_cpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <input type="password" class="form-control col-md-6 col-sm-6 col-xs-12" id="user_cpassword" name="confirm_password" placeholder="Confirm Password" />
                    @if ($errors->any()) <div style="color:red">{{$errors->first('confirm_password')}}</div>@endif

                </div>
            </div>
        </div>
        <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token()}}"/>
        @if(Session::has('Err'))
            <div class="co-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
                <p class="alert alert-warning">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{Session::get('Err')}}
                </p>
            </div>
            @endif
            <div class="form-group">
                <div class="co-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
                    <button type="reset" class="btn btn-warning btn-md pull-left">Reset</button>
                    <button type="submit" class="btn btn-success btn-md pull-right">Login</button>
                </div>
            </div>
    </form>

@endsection