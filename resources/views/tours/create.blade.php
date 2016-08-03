@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>Tours</h1>
    </div>
    <div class="row">
        {!! Form::open(['files' => true,'action' => 'ToursController@store','method' => 'POST']) !!}
            @include('tours._form');
        {!! Form::close() !!}
    </div>
</div>
@stop