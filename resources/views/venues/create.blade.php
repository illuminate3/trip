@extends('layouts.homepage')

@section('title')
    Venue Create
@stop

@section('content')
<section >
	<div class="section-wrap row">
        <div class="section-head">
            <h3>Create a Venue</h3>
        </div>
		<div class="section-content">
		<div class="row">
        {!! Form::open(['files' => true, 'method' => 'POST', 'action' => 'VenuesController@store']) !!}
            @include('venues._form')
        {!! Form::close() !!}
    </div>
</div>
@stop