@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
      <h1>Gallery Page</h1>
  </div>
</div>
  <div class="container">
    <div class="row">
      <div class="col-md-8">

        <h4>{{ $gallery->title }}</h4>
        <h5>{{ $gallery->description }}</h5>
        <img src="{{ $gallery->image }}" alt="" />
      </div>
      <aside class="col-md-4">
          <h2 class="underline">Owner</h2>
          <a href="{{ checks_model($gallery->imageable_type,$gallery->imageable->slug) }}">
            <h4>{{ $gallery->imageable->name }}</h4>
          </a>
          <img src="{{ $gallery->imageable->logo }}" alt="" />
      </aside>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <h1 class="text-center row">Other Pictures by &nbsp; <b>{{ $gallery->imageable->name }}</b></h1>
      <div class="row">
        @foreach($pictures as $picture)
        <div class="col-md-4">
          <img src="{{ $picture->image }}" class="img-thumbnail img-responsive" alt="" />
        </div>

        @endforeach
      </div>
    </div>

  </div>
@stop
