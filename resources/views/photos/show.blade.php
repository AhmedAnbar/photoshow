@extends('layouts.app')

@section('title')
{{ $photo->title }} Photo
@endsection

@section('content')
<h3>{{ $photo->title }}</h3>
<p>{{ $photo->description }}</p>
<a href="/albums/{{$photo->album_id}}" class="btn btn-secondary btn-sm">Back To Gallery</a>
<hr>
<img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{$photo->title}}">
<br><br>
{!! Form::open(['action' => ['PhotosController@destroy', $photo->id], 'method' => 'POST']) !!}
  {{ Form::bsSubmit('Delete Photo', ['class' => 'btn btn-danger btn-sm']) }}
  {{ Form::hidden('_method', 'DELETE') }}
{!! Form::close() !!}
<hr>
<small>Size: {{$photo->size}}</small>

@endsection
