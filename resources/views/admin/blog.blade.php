@extends('layouts.admin')

@section('title')
    Blog Management
@endsection

@section('content')
    <div class="container">
        <div class="row">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="page-header">Blog Management</h1>
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
                <div class="col-lg-4 col-xs-12 col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Blog Management
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="clearfix">&nbsp;</div>
                            <div class="col-md-8">
                                <h1 class="page-header">
                                    Latest Post
                                    {{-- <small>Secondary Text</small> --}}
                                    @if(Auth::check())
                                        <a href="{{ route('article.create') }}">
                                            <button class="btn btn-md btn-success pull-right">Post new</button>
                                        </a>
                                    @endif
                                </h1>
                                <!-- Blog Posts Listing -->
                                @if(count($blogs) > 0)
                                    @foreach($blogs as $article)
                                        <article class="panel panel-default">
                                            <div class="panel-heading">
                                                <div class="pull-right">
                                                    <a href="{{ route('article.edit', [$article->slug]) }}" style="float: left">
                                                        <button type="button" class="btn btn-xs" style="float: left">
                                                            <i class="fa fa-pencil fa-2x"></i>
                                                        </button>
                                                    </a>
                                                    <form action="{{ route('article.destroy', [$article->slug]) }}" method="POST" style="float: left">
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                        <button type="submit" class="btn btn-xs" style="color: #337AB7"><i class="fa fa-times fa-2x"></i></button>
                                                    </form>
                                                </div>
                                                <h2><a href="{{ route('article.show', [$article->slug]) }}">{{ $article->title }}</a>&nbsp;<small>(<a href="#">{{ $article->category->name }}</a>)</small></h2>

                                            </div>
                                            <div class="panel-body">
                                                <p><a href="{{  URL::to('userarticle/'.$article->user_id) }}"><span class="glyphicon glyphicon-user"></span> {{ $article->user->first_name }} {{ $article->user->last_name }}</a> <span class="glyphicon glyphicon-time"></span> {{ $article->created_at }}</p>
                                                <p>{!! str_limit($article->body, 300) !!}</p>
                                            </div>
                                            <div class="panel-footer">
                                                <p>
                                                    @unless($article->tags->isEmpty())
                                                        @foreach($article->tags as $tag)
                                                            <a href="#">
                                                                <span class="glyphicon glyphicon-tag"></span>{{ $tag->name }}
                                                            </a>
                                                        @endforeach
                                                    @endunless
                                                    <a class="btn btn-default btn-sm pull-right" href="{{ route('article.show', [$article->slug]) }}">more...</a>
                                                </p>
                                                <br />
                                            </div>
                                        </article>
                                    @endforeach
                                <!-- Pager -->
                                    {{-- <ul class="pager">
                                        <li class="previous">
                                            <a href="#">&larr; Older</a>
                                        </li>
                                        <li class="next">
                                            <a href="#">Newer &rarr;</a>
                                        </li>
                                    </ul> --}}
                                @else
                                    Sorry, no articles are found! <i class="fa fa-frown-o" aria-hidden="true"></i>
                                @endif
                            </div>
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
        </div>
    <!-- /.row -->
@endsection

