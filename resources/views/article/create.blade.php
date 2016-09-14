@extends('layouts.article')

@section('title')
    Post Article
@endsection

@section('extended-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.2/css/selectize.bootstrap3.min.css" />
@stop

@section('article-content')
    <div class="col-md-8 col-sm-8 col-lg-6">
        @if($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li> <div style="color:red">{{ $error }}</div></li>
            @endforeach
        </ul>
    @endif
    <form method="post" action="{{ route('article.store') }}" class="form" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="article-title">Title</label>
            <input id="article-title" value="{{old('title')}}" type="text" name="title" class="form-control input-sm" />
        </div>
        {{-- <div class="form-group">
            <label for="article-slug">Slug</label>
            <input id="article-slug" type="text" name="slug" class="form-control input-sm" disabled />
        </div> --}}
        <div class="form-group">
            <label for="article-category">Category</label>
            <select id="article-category" value="{{old('category')}}" name="category" class="form-control input-sm">
                <option value="">-- Select --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="article-body">Body</label>
            <textarea id="article-body" rows="25" name="body" class="form-control">{{old('body')}}</textarea>
        </div>
        <div id="prefetch" class="form-group">
            <label for="article-tags">Tags</label>
            <input type="text" value="{{old('tags')}}" id="article-tags" class="form-control input-sm" name="tags" placeholder="Tags" />
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-md btn-success pull-right">Post</button>
        </div>
    </form>
    </div>
@stop

@section('extended-script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.2/js/standalone/selectize.min.js"></script>
    <script src="{{ URL::to('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script src="{{ URL::to('vendor/unisharp/laravel-ckeditor/adapters/jquery.js') }}"></script>
    <script src="{{ URL::to('src/js/typeahead.bundle.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#article-tags').selectize({
                plugins: ['remove_button'],
                delimiter: ', ',
                persist: false,
                create: function(input) {
                    return {
                        value: input,
                        text: input
                    }
                }
            });
        });    
    </script>
    <script>
        $('#article-body').ckeditor();
    </script>
@stop