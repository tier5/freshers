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
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Category {{ $category->name }}
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <a href="{{ route('admin.category.index') }}"><button class="btn btn-default btn-sm">See all</button></a>
                            <div class="clearfix">&nbsp;</div>
                            @foreach ($category->articles->reverse() as $article)
                                <article class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3><a href="{{ route('article.show', [$article->slug]) }}">{{ $article->title }}</a></h3>
                                    </div>
                                    <div class="panel-body">
                                        <p><a href="#"><span class="glyphicon glyphicon-user"></span> {{ $article->user->first_name }} {{ $article->user->last_name }}</a> <span class="glyphicon glyphicon-time"></span> {{ $article->created_at }}</p>
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