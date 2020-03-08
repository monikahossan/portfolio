@extends('layout/main')
@section('content')

<div class="callout primary">
<div class="row column">

<h1>{{ $photo->title }}</h1>
<p class="lead">{{ $photo->description }}</p>
<p>{{ $photo->location }}</p>
<p class="lead">Upload Your Portfolio Here</p>
<a class="button" href="/gallery/show/{{ $photo->gallery_id }}">Back To Portfolio</a>
</div>
</div>
<div class="row small-up-2 medium-up-3 large-up-4">
  <div class="main">
    <img class="proImg" src="/img/{{ $photo->image }}" alt="">
    <p style="text-align:center; margin-top:20px;">
      <a class="button" href="/photo/edit/{{$photo->id}}">Update Portfolio</a>
        <a class="button" href="/photo/destroy/{{$photo->id}}/{{$photo->gallery_id}}" onclick="return confirm('Are you sure?');">
          Delete Portfolio</a>
    </p>
  </div>
</div>
@stop
