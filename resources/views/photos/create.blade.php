@extends('layouts.app')

@section('title')
Upload Photo
@endsection

@section('content')
<div class="row">
  <div class="col-md-10 offset-md-1">
    <h1>Upload Photo</h1>
    <hr>
  </div>
</div>
<div class="row">
  <div class="col-md-8 offset-md-2">
    {!! Form::open(['action' => 'PhotosController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{ Form::hidden('album_id', $album_id) }}
        {{ Form::bsText('title', '', ['placeholder' => 'Photo Name']) }}
        {{ Form::bsTextArea('description', '', ['placeholder' => 'Photo Description']) }}
        {{ Form::bsFile('photo', ['class' => 'btn btn-primary btn-sm', 'style' => 'margin-bottom: .5rem;']) }}
        {{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary']) }}
        <br>
    {!! Form::close() !!}
  </div>
</div>

@endsection
