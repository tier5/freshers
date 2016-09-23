@extends('layouts.app')

@section('title')
    Laravelsite | Upload Photo For Meme
@endsection

@section('style')
    <link rel="stylesheet" href="/css/upload.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
    <style>
        body { background-color: #00A6C7}
    </style>
@endsection

@section('content')
      <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading"><strong>Upload Files</strong> <small>Only Image is allowed</small></div>
            <div class="panel-body">

                <!-- Standar Form -->
                <h4>Select file from your computer</h4>
                <form action="{{ route('postupload') }}" method="post" enctype="multipart/form-data" id="js-upload-form">
                    <div class="form-inline">
                        <div class="form-group">
                            <input type="file" name="file" id="js-upload-files">
                        </div>
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-sm btn-primary" id="js-upload-submit">Upload files</button>
                    </div>
                </form>

                <!-- Drop Zone -->
                <h4>Or drag and drop file below</h4>
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('postupload') }}" method="post" enctype="multipart/form-data" class="dropzone" id="book-image">
                            <div>
                                <h3>Upload Image</h3>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- /container -->
@endsection
