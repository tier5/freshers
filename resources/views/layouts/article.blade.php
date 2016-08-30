@extends('layouts.app')

@section('extended-style')
    <link rel="stylesheet" type="text/css" href="{{ URL::to('src/css/typeaheadjs.css') }}">
@stop

@section('content')
     @yield('article-content')
    <!-- Blog Sidebar Widgets Column -->
    <div class="col-md-4">
        <!-- Blog Search Well -->
        <div class="well">
            <h4>Search Everything</h4>
            @include('search.bar')
            <!-- /.input-group -->
        </div>
        <!-- Blog Categories Well -->
        <div class="well">
            <h4>Popular Categories</h4>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        @foreach ($categories as $category)
                            <li><a href="#">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- Side Widget Well -->
        <div class="well">
            <h4>Popular Tags</h4>
            <p>
                @foreach ($tags as $tag)
                    <a href="#"><span class="glyphicon glyphicon-tag"></span>{{ $tag->name }}</a>&nbsp;
                @endforeach
            </p>
        </div>
    </div>
@stop

@section('extended-script')
<script src="http://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.1/typeahead.bundle.min.js"></script>
<script>
    var data = new Bloodhound({
          datumTokenizer: function(d) { 
              return Bloodhound.tokenizers.whitespace(d.datum); 
          },
          queryTokenizer: Bloodhound.tokenizers.whitespace,
          prefetch: '{{ route('search.data') }}'
    });

    data.initialize();
    $(document).ready(function() {
        $('.typeahead').typeahead({
            highlight: true
        },
        {
            displayKey: 'datum',
            source: data.ttAdapter(),
            templates: {
                empty: ['<div class="list-group-item" style="margin: 0px 20px 10px 20px">Found nothing! :(</div>'],
                header: ['<div class="list-group search-results-dropdown">'],
                suggestion: function(item) {
                    return "<p>" + item.datum + " - " + item.type + "</p>";
                }
            }
        });
    });
</script>
@stop
