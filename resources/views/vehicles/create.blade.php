
@extends('layouts.profile')

@section('title')
    Vehicles Create
@stop

@section('profile-content')

<section >
	<div class="section-wrap row">
        <div class="section-head">
            <h3>Create a Vehicle</h3>
        </div>
		<div class="section-content">
		<div class="row">
        {!! Form::open(['action' => 'VehiclesController@store','files' => true]) !!}
            @include('vehicles._form');
        {!! Form::close() !!}
    </div>
</div>
@stop