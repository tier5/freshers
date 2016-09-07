@extends('layouts.app')

@section('title')
    Reset password
@endsection

@section('content')
    <div class="container">
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

        <div class="form-group" class="form-group">
            <label for="user_cpassword" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password</label>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="row">
                    <input type="password" class="form-control col-md-6 col-sm-6 col-xs-12" id="user_cpassword" name="confirm_password" placeholder="Confirm Password" />

                    <div id="cpswd_info">
                        <strong id="cpswd" class="invalid">password & confirm Password Should be match</strong>
                    </div>
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
                    <button type="submit" class="btn btn-success btn-md pull-right">Change Password</button>
                    <div id="pswd_info" class="form-group">
                        <h4>Password must meet the following requirements:</h4>
                        <ul>
                            <li id="smaller" class="invalid">At least <strong>one smaller letter</strong></li>
                            <li id="capital" class="invalid">At least <strong>one capital letter</strong></li>
                            <li id="number" class="invalid">At least <strong>one number</strong></li>
                            <li id="length" class="invalid">Be at least <strong>8 characters</strong></li>
                        </ul>
                    </div>
                </div>

            </div>

    </form>
</div>

@endsection


@section('script')
    <script src="http://code.jquery.com/jquery-1.7.min.js"></script>
    <script src="/js/registration.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
@endsection
