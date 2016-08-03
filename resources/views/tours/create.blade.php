
@extends('layouts.homepage')

@section('title')
    Tour Create
@stop

@section('content')
<section >
	<div class="section-wrap row">
        <div class="section-head">
            <h3>Create a Tour</h3>
        </div>
		<div class="section-content">
		<div class="row">
        {!! Form::open(['files' => true,'action' => 'ToursController@store','method' => 'POST']) !!}
            @include('tours._form')
        {!! Form::close() !!}
    </div>
</div>
@stop