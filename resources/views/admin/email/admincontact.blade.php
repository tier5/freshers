@extends('layouts.admin')

@section('title')
    Contact Management
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-7">
                <h1 class="page-header">Contact Management</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        @if (Session::has('success'))
            <div class="row">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('success') }}
                </div>
            </div>
    @endif
    <!-- /.row -->
        <div class="row">
            <div class="row">
                <div class="col-lg-offset-2 col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Message details
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group-item">
                            <div class="row">
                                    <div class="col-xs-8 col-md-8 col-lg-8 col-xs-12">
                                        <div class="row">
                                            <div class="col-xs-1 col-md-1 col-sm-3 col-lg-2">From: </div>
                                            <div class="col-xs-9 col-md-9 col-sm-8 col-lg-9">{{ $contact->email }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-1 col-md-1 col-sm-3 col-lg-2">Name: </div>
                                            <div class="col-xs-9 col-md-9 col-sm-8 col-lg-9">{{ $contact->first_name.' '.$contact->last_name }}</div>

                                        </div>

                                        <div class="row">
                                            <div class="col-xs-1 col-md-1 col-sm-3 col-lg-2">Phone: </div>
                                            <div class="col-xs-9 col-md-9 col-sm-8 col-lg-9">{{ $contact->phone }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-1 col-md-1 col-sm-3 col-lg-2">Send at: </div>
                                            <div class="col-xs-9 col-md-9 col-sm-8 col-lg-9">{{ $contact->created_at }}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-10 col-md-10 col-sm-10 col-lg-8">
                                                <div class="panel-info" style="background-color: #8CD0D3;border: dotted;">
                                                {{ $contact->message }}
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-10 col-md-10 col-sm-10 col-lg-8">
                                            <a class="pull-right" href="{{ route('admin.email.reply',[ $contact->id]) }}"><button class="btn btn-primary btn-xl"><i class="fa fa-reply fa-fw"></i>Reply</button></a>
                                        </div>
                                            </div>
                                    </div>
                    <!-- /.panel -->
                                </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
    </div>
            </div>
        </div>
        </div>
    <!-- /.row -->
@endsection