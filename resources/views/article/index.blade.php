@extends('layouts.article')

@section('title')
    Articles
@endsection

@section('article-content')

    <!-- Blog Entries Column -->
    <div class="col-md-8 col-sm-8 col-lg-8">
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
        @if(count($articles) > 0)
            @foreach($articles as $article)
                <article class="panel panel-default">
                    <div class="panel-heading">
                        <h2><a href="{{ route('article.show', [$article->slug]) }}">{{ $article->title }}</a>&nbsp;<small>(<a href="{{ route('showcategoryarticle',[$article->category->name]) }}">{{ $article->category->name }}</a>)</small></h2>
                    </div>
                    <div class="panel-body">
                        <p><a href="{{  URL::to('userarticle/'.$article->user_id) }}"><span class="glyphicon glyphicon-user"></span> {{ $article->user->first_name }} {{ $article->user->last_name }}</a> <span class="glyphicon glyphicon-time"></span> {{ $article->created_at }}</p>
                        <p>{!! str_limit(Emojione\Emojione::toImage($article->body), 300) !!}</p>
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
@stop
