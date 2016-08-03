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
		<div class="row">
        {!! Form::open(['action' => 'HotelsController@store','files' => true]) !!}
                @include('hotels._form')
        {!! Form::close() !!}
    </div>
</div>
@stop