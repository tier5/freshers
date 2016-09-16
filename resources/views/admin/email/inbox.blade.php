@extends('layouts.admin')

@section('title')
    Tag Management
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
                            Contact Management
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                    <div class="list-group">
                        @if(count($contacts)>0)
                        @foreach($contacts as $contact)
                        <a href="{{ route('contactmanagement',[$contact->id]) }}" class="list-group-item">
                            <form class="form form-inline" action="{{ route('message.delete',[$contact->id]) }}" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <button class="btn btn-danger btn-xs pull-right" type="submit"><i class="fa fa-trash-o fa-fw"></i> Delete</button>
                            </form>
                            <span class="glyphicon glyphicon-star-empty"></span><span class="name" style="min-width: 120px;
                                display: inline-block;">{{ $contact->first_name.' '.$contact->last_name }}</span> <span class="">{!! str_limit($contact->message,20) !!}</span>
                             <span class="badge">{{ $contact->created_at }}</span> <span class="pull-right"><span class="glyphicon glyphicon-paperclip">
                                    </span></span></a>
                            @endforeach
                            @else
                                <div class="cm-error">You Don't Have Any Email</div>
                            @endif
                </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
    </div>
@endsection