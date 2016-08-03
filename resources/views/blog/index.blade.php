@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>All Posts</h1>
            <div class="col-md-12">
            @foreach($posts as $post)
                <div class="col-md-6">
                    <a href="{{ url('posts/'.$post->id) }}">
                        <div class="col-md-6">
                            <img class="img-thumbnail img-responsive" src="{{ $post->image }}" alt="">
                        </div>
                        <h4 class="col-md-6">{{$post->title}}</h4>
                    </a>
                </div>
            @endforeach
            </div>
        </div>
    </div>
@stop
