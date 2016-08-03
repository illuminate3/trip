@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1 class="col-md-12">{{ $post->title }}</h1>
            <div class="col-md-12">
                <img src="{{ $post->image }}" class="img-responsive img-thumbnail" alt="">
            </div>
            <p>{{ $post->content }}</p>
        </div>
    </div>
@endsection