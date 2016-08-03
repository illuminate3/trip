@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Edit your post</h1>
            <div class="col-md-12">
            {!! Form::post(['action' => 'PostsController@create', 'method' => 'POST']) !!}
                @include('blog._form')
            {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop
