@extends('layouts.app')

@section('title')
    Laravelsite | Create Meme
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

        <div class="container">
            <div class="row">
                <div class="col-md-6" id="preview"></div>

                <div class="col-md-4 col-xs-12 col-lg-4 col-sm-4">
                    <button class="btn btn-success" id="previewbtn">Preview</button>
                    @if(Auth::check())<button class="btn btn-success" id="save" onclick="save('1')">Save</button>@endif
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
        })
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


        }
        $("#download").click(function(e){
            e.preventDefault();

            $("#example-save").memeGenerator("download");
        });
        //
    </script>
@endsection
