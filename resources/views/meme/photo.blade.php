
@extends('layouts.app')

@section('title')
   Photo For meme
@endsection


@section('content')
    <div class="row">
        @if (Session::has('success'))
            <div class="row">
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('success') }}
                </div>
            </div>
        @endif
        @if (Session::has('warning'))
            <div class="row">
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{ Session::get('warning') }}
                </div>
            </div>
        @endif
    </div>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Select a Photo
                    <small>For Creating Your Meme</small>
                </h1>
            </div>
            <div class="pull-right">
                <a href="{{ Auth::check()?route('photo.upload'):route('login') }}"> <i class="fa fa-upload fa-2x" aria-hidden="true">Upload new Photo</i></a>
            </div>
        </div>
        <!-- /.row -->

        <!-- Projects Row -->
        @if(count($photos)>0)
            <div class="row">

                @foreach($photos as $photo)
                    <div class="col-md-2 col-xs-12 col-lg-2 col-sm-2 portfolio-item">
                        <a href="{{ route('create.meme',[$photo->id]) }}">
                            <img class="img-responsive"style="height:100px; width:150px;border: solid;" atr="http://placehold.it/700x400" src="/uploads/meme/{{ $photo->name }}">
                        </a>
                        <br>
                    </div>
                @endforeach
            </div>
        @else
            You do not Create A meme Yet !!
    @endif
    <!-- /.container -->
    </div>



@endsection