@extends('layout/main')
@section('content')

<div class="callout primary">
<div class="row column">
<h1>Create Portfolio Gallery</h1>
<p class="lead">Upload Your Portfolio Here</p>
</div>
</div>
<div class="row small-up-2 medium-up-3 large-up-4">
<div class="mainDiv">
  {!! Form::open(array('action' => 'GalleryController@store', 'enctype' =>
  'multipart/form-data'))    !!}

  {!! Form::label('name', 'Name') !!}
  {!! Form::text('name', $value = null, $attributes =['placehold' =>
  'Gallery Name','name' => 'name', 'required' =>'required']) !!}

  {!! Form::label('description', 'Description') !!}
  {!! Form::text('description', $value = null, $attributes =['placehold' =>
  'Gallery Description','name' => 'description', 'required' =>'required']) !!}

  {!! Form::label('cover_image', 'Cover Image') !!}
  {!! Form::file('cover_image') !!}

  {!! Form::submit('Submit',$attributes = ['class' => 'button'] ) !!}

  {!! Form::close()    !!}
</div>
</div>
@stop
