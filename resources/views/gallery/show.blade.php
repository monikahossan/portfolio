@extends('layout/main')
@section('content')

<div class="callout primary">
<div class="row column">

<h1>{{$gallery->name}}</h1>
<p class="lead">{{$gallery->description}}</p>

@if (Auth::check())
<a class=" succcess button" href="/photo/create/{{$gallery->id}}">Upload Portfolio</a>
@endif
<a class="button"  href="/">Back To Portfolio</a>
</div>
</div>

<div class="row small-up-2 medium-up-3 large-up-4">
  <?php foreach ($photos as $photo): ?>
    <div class="column">
      <a href="/photo/details/{{$photo -> id}}">
      <img class="thumbnail" src="/img/{{$photo -> image}}"/>
      </a>
      <h5>{{ $photo->title }}</h5>
      <p>{{ $photo->description }}</p>
    </div>
  <?php endforeach; ?>
</div>
@stop
