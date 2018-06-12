@extends('layouts.app')

@section('title')
Create Album
@endsection

@section('content')
<div class="row">
  <div class="col-md-10 offset-md-1">
    <h1>Create Album</h1>
    <hr>
  </div>
</div>
<div class="row">
  <div class="col-md-8 offset-md-2">
    {!! Form::open(['action' => 'AlbumsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        {{ Form::bsText('name', '', ['placeholder' => 'Album Name']) }}
        {{ Form::bsTextArea('description', '', ['placeholder' => 'Album Description']) }}
        {{ Form::bsFile('cover_image', ['class' => 'btn btn-primary btn-sm', 'style' => 'margin-bottom: .5rem;']) }}
        {{ Form::bsSubmit('Submit', ['class' => 'btn btn-primary']) }}
        <br>
    {!! Form::close() !!}
  </div>
</div>

@endsection
