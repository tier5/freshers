@extends('layouts.app')

@section('title')
    Create Meme
@endsection

@section('style')
<script src=""></script>
<link rel="stylesheet" href="text/css">
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="/js/spectrum.js"></script>
    <script src="//connect.facebook.net/en_US/sdk/debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.js"></script>
    <script type="text/javascript" src="/js/fb-sharing.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/5.0.7/sweetalert2.min.css">
    <script type="text/javascript" src="/js/jquery.memegenerator.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/jquery.memegenerator.min.css">
    <link rel="stylesheet" type="text/css" href="/css/spectrum.css">
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.2/css/selectize.bootstrap3.min.css" />

    <style>
        h2 {
            display: block;
            text-align: center;
        }

        .example {
            margin: 0 0 10% 0;
        }

        .bootstrap {
            width: 600px;
            margin-right: auto;
            margin-left: auto;
        }

        .save button {
            display: block;
            width: 100%;
            margin-bottom: 15px;
            font-size: 24px;
        }

        #preview {
            min-height: 200px;
            background-color: #EFEFEF;
        }
        #preview img {
            max-width: 100%;
        }
    </style>
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
    <div class="example save">
        <h2>Create Your own Meme</h2>

        <img src="/uploads/meme/{{ $photo }}" id="example-save">

        <div id="toolbar"></div>

        <div class="bootstrap">
            <button id="blog"  style="font-size: 25px;"><i class="fa fa-paperclip" aria-hidden="true"> Attach a Blog</i>
            </button>
        </div>




        <span id="show" style="display: none;">
            <div class="col-md-8 col-sm-8 col-lg-6">
        @if($errors->any())
                    <ul>
            @foreach ($errors->all() as $error)
                            <li> <div style="color:red">{{ $error }}</div></li>
                        @endforeach
        </ul>
                @endif
                <form method="post" class="form" role="form">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="article-title">Title</label>
            <input id="article-title" value="{{old('title')}}" type="text" name="title" class="form-control input-sm" />
        </div>
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
            <button type="submit" id="post" class="btn btn-md btn-success pull-right">Post</button>
        </div>
    </form>
    </div>
        </span>





        <div class="container">
            <div class="row">
                <div class="col-md-6" id="preview"></div>

                <div class="col-md-4 col-xs-12 col-lg-4 col-sm-4">
                    <button class="btn btn-success" id="previewbtn">Preview</button>

                    <button class="btn btn-success" id="save">Save</button>
                    <button class="btn btn-danger" id="download">Download</button>
                    <table>
                        <tr>
                            <td>
                                <i class="fa fa-facebook-square fa-3x" onclick="save('0')" aria-hidden="true"></i>
                                &nbsp;
                            </td>
                            <td>
                                <i class="fa fa-twitter-square  fa-3x" aria-hidden="true"></i>
                                &nbsp;
                            </td>
                            <td>
                                <i class="fa fa-google-plus fa-3x" aria-hidden="true"></i>
                                &nbsp;
                            </td>
                                      
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Example with saving

        $("#example-save").memeGenerator({
            useBootstrap: false,
            layout: "horizontal",
            previewMode: "css",
            defaultTextStyle: {
                font: "'Comic Sans', Arial",
            },
            captions: [
                "PREDEFINED text on top"
            ]

        });
        $("#previewbtn").click(function (e) {
            e.preventDefault();
            var imageDataUrl = $("#example-save").memeGenerator("save");
            $("#preview").html(
                    $("<img>").attr("src", imageDataUrl)
            );
        });
        function save(flag)
        {
            //alert(flag);
            var imageDataUrl = $("#example-save").memeGenerator("save");

             $.ajax({
                 url: "{{ route('meme.save') }}",
                 type: "POST",
                 data: {image: imageDataUrl},
                 dataType: "json",
                 success: function(response){
                    
                     if(response.status == 'success') {
                        //alert(response.path);
                         //alert('Meme Successfully Saved');
                         if(flag==1){
                         swal({
                             title: 'Success!',
                             text: 'Your Meme Successfully Saved',
                             type: 'success',
                             confirmButtonText: 'Okay'
                         })
                        }
                        else if(flag==0){
                            fb_share(response.path);
                        }
                     }
                     else{
                        alert('failed.. try again buddy!!');
                     }
                     $("#preview").html(
                             $("<img>").attr("src", response.filename)
                     );
                 }
             });
        };
        $("#post").click(function (e) {
            e.preventDefault();

            var imageDataUrl = $("#example-save").memeGenerator("save");
            var title=$("#article-title").val();
            var category=$("#article-category").val();
            var body=$("#article-body").val();
            var tags=$("#article-tags").val();

            $.ajax({
                url: "{{ route('create.mame.blog') }}",
                type: "POST",
                data: {imageDataUrl: imageDataUrl,title: title,category: category, body:body, tags: tags},
                dataType: "json",
                success: function(response){
                    if(response.status == 'success') {
                        //alert('Meme Successfully Saved');
                        swal({
                            title: 'Success!',
                            text: 'Your Meme Successfully Saved With Bolg',
                            type: 'success',
                            confirmButtonText: 'Okay'
                        })
                    }
                    $("#preview").html(
                            $("<img>").attr("src", response.filename)
                    );
                }
            });

        });
        $("#download").click(function(e){
            e.preventDefault();

            $("#example-save").memeGenerator("download");
        });
        //
        $("#blog").click(function () {
            $("#show").toggle();
        });
    </script>
@endsection

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
