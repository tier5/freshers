@extends('layouts.admin')

@section('title')
    Category Management
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Category Management</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
            <div class="row">
                <div class="col-lg-offset-2 col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Edit Category
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <form class="form form-inline" action="{{ route('admin.category.update', [Hashids::encode($category->id)]) }}" method="post">
                                <input type="hidden" name="_method" value="PUT">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <input class="form-control input-sm" type="text" name="name" placeholder="Category name" value="{{ $category->name }}">
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