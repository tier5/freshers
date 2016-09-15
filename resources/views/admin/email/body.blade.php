@extends('layouts.admin')

@section('title')
    Tag Management
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Contact Management</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        @if (Session::has('success'))
            <div class="row">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('success') }}
                </div>s
            </div>
    @endif
    <!-- /.row -->
        <div class="row">
            <div class="row">
                <div class="col-lg-offset-2 col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Reply Email
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" style="background-color: #00A6C7">
                            <form class="form-horizontal" method="post" action="{{ route('admin.postreply') }}">
                                <div class="form-group">
                                    <label for="to" class="control-label col-md-3 col-sm-3 col-xs-12">To</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="row">
                                            <input type="email" class="form-control col-md-6 col-sm-6 col-xs-12" value="{{$contact->email}}"  name="email" id="to" readonly/>
                                            @if ($errors->any()) <div style="color:red">{{$errors->first('email')}}</div>@endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="subject" class="control-label col-md-3 col-sm-3 col-xs-12">Subject</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="row">
                                            <input type="text" class="form-control col-md-6 col-sm-6 col-xs-12" value="{{old('subject')}}"  name="subject" id="subject"/>
                                            @if ($errors->any()) <div style="color:red">{{$errors->first('email')}}</div>@endif
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="body" class="control-label col-md-3 col-sm-3 col-xs-12">Body</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <div class="row">
                                            <input type="text" name="geeting" id="body" value="Hi {{$contact->first_name}}," readonly>
                                            <textarea class="form-control"  name="body" id="body_geet">{{old('body')}}</textarea>
                                            @if ($errors->any()) <div style="color:red">{{$errors->first('email')}}</div>@endif
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="_token" id="csrf-token" value="{{ csrf_token()}}"/>
                                <div class="form-group">
                                    <div class="co-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-12">
                                        <button type="submit" class="btn btn-success btn-md pull-right">Send</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
    </div>
    <!-- /.row -->

@endsection