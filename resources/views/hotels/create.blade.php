@extends('layouts.homepage')

@section('title')
    Hotel Create
@stop

@section('content')
<section >
	<div class="section-wrap row">
        <div class="section-head">
            <h3>Create a Hotel</h3>
        </div>
		<div class="section-content">
		<div class="row ajax-form" id="ajax-form">
        {!! Form::open(['action' => 'HotelsController@store','files' => true]) !!}
                @include('hotels._frontendform')
        {!! Form::close() !!}
    </div>
</div>
@stop