@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>Edit vehicles</h1>
    </div>
    <div class="row">
        {!! Form::model($vehicle, [ 'action'=> 'VehiclesController@update' ,'method'=>'PUT','files' => true]) !!}
        	@include('vehicles._form');
        {!! Form::close() !!}
    </div>
</div>
@stop
