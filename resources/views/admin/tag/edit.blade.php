@extends('layouts.admin')

@section('title')
    Tag Management
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tag Management</h1>
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
                            Tag Management
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" style="background-color: #00A6C7">
                            <form class="form form-inline" action="{{ route('admin.tag.update', [Hashids::encode($tag->id)]) }}" method="post">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <input class="form-control input-sm" type="text" name="name" placeholder="Tag name" value="{{ $tag->name }}" />
                                </div>
                                <button class="btn btn-warning btn-sm" type="submit">Edit</button>
                            </form>
                            @if($errors->any())
                                @foreach ($errors->all() as $error)
                                    <span style="color: red">{{ $error }}</span>
                                @endforeach
                            @endif
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