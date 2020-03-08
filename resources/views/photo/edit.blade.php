
@extends('layout/main')
@section('content')

<div class="callout primary">
<div class="row column">
  <a href="/gallery/show/{{ $photo->gallery_id }}">Back To Portfolio</a>
<h1>Update Portfolio</h1>
<p class="lead">Update Your Portfolio Here</p>
</div>
</div>
<div class="row small-up-2 medium-up-3 large-up-4">
<div class="mainDiv">
  {!! Form::open(array('action' => 'PhotoController@udatedata', 'enctype' =>
  'multipart/form-data'))    !!}

  <input type="hidden" name="id" value="{{$photo->id}}">
  {!! Form::label('title', 'Title') !!}
  {!! Form::text('title', $value = $photo->title, $attributes =['name' => 'title', 'required' =>'required']) !!}

  {!! Form::label('description', 'Description') !!}
  {!! Form::text('description', $value =$photo->description, $attributes =['name' => 'description', 'required' =>'required']) !!}

  {!! Form::label('location', 'Location') !!}
  {!! Form::text('location', $value = $photo->description, $attributes =['name' => 'location', 'required' =>'required']) !!}

  <div class="upNew">
    {!! Form::label('image', 'Image') !!}
    {!! Form::file('image') !!}
  </div>

  <div class="prevImg">
    <img src="/img/{{$photo->image}}" alt="">
  </div>

  <input type="hidden" name="gallery_id" value="{{$photo->gallery_id}}">
  {!! Form::submit('Update',$attributes = ['class' => 'button'] ) !!}

  {!! Form::close()    !!}
</div>
</div>
@stop
