@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>Venues</h1>
    </div>
    <div class="row">
        {!! Form::open(['files' => true, 'method' => 'POST', 'action' => 'VenuesController@store']) !!}
            @include('venues._form');
        {!! Form::close() !!}
    </div>
</div>
@stop