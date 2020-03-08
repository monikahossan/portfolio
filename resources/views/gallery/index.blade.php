@extends('layout/main')
@section('content')

<div class="callout primary">
<div class="row column">
<h1>Portfolio Gallery</h1>
<p class="lead">Click the image to see the description</p>
</div>
</div>
<div class="row small-up-2 medium-up-3 large-up-4">
<?php  foreach ($galleries as $gallery) : ?>


<div class="column">
  <a href="/gallery/show/{{ $gallery->id }}">
<img class="thumbnail" src="/img/{{ $gallery->cover_image }}">
</a>
<h5>{{ $gallery->name }}</h5>
<p> {{ $gallery ->description }}</p>
@if (Auth::check())
<a class=" succcess button" href="/photo/create/{{$gallery->id}}">Edit</a>
<a class=" succcess button" href="/photo/create/{{$gallery->id}}">Delete</a>

@endif
</div>

<?php  endforeach; ?>
</div>
@stop
