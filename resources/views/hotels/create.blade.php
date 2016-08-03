@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>Hotels</h1>
    </div>
    <div class="row">
        {!! Form::open(['action' => 'HotelsController@store','files' => true]) !!}
                @include('hotels._form');

        {!! Form::close() !!}
    </div>
</div>
@stop