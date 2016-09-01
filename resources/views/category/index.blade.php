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
                            Category Management
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <a href="{{ route('admin.category.create') }}">
                                <button class="btn btn-success btn-sm" type="submit">Create</button>
                            </a>
                            </form>
                            <div class="clearfix">&nbsp;</div>
                            <table width="100%" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr class="odd">
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.category.show', ['id' => Hashids::encode($category->id)]) }}"><button class="btn btn-primary btn-xs"><i class="fa fa-info-circle fa-fw"></i> Info</button></a>
                                                <a href="{{ route('admin.category.edit', ['id' => Hashids::encode($category->id)]) }}"><button class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o fa-fw"></i> Edit</button></a>
                                                <form class="form form-inline" action="{{ route('admin.category.update', [Hashids::encode($category->id)]) }}" method="post">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash-o fa-fw"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
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