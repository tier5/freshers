@extends('layouts.app')

@section('title')
    Laravelsite | Your Meme
@endsection

@section('content')
    <!-- Page Content -->
    <div class="container">

        <!-- Projects Row -->
        <div class="row centered">
            <div class="col-md-8 col-xs-12 col-lg-8 col-sm-8">
                <img class="img-responsive" height=1000px width=1000px atr="http://placehold.it/700x400" src="/uploads/meme/{{ $meme->name }}">
                <p><h3>{{ $meme->name }}</h3></p>
                <p>Created at: {{ $meme->created_at }}</p>
            </div>

        </div>
        <!-- /.container -->
    </div>
@endsection
