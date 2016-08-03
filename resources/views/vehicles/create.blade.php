@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>vehicles</h1>
    </div>
    <div class="row">
        {!! Form::open(['action' => 'VehiclesController@store','files' => true]) !!}
            @include('vehicles._form');
        {!! Form::close() !!}
    </div>
</div>
@stop