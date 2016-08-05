@extends('layouts.profile')

@section('title')
    Restaurant Create
@stop

@section('profile-content')

<section >
	<div class="section-wrap row">
        <div class="section-head">
            <h3>Create a Restaurant</h3>
        </div>
		<div class="section-content">
		<div class="row">
        {!! Form::open(['action' => 'RestaurantsController@store','method'=>'post','files' => true]) !!}
            @include('restaurants._form')
        {!! Form::close() !!}
    </div>
</div>
@stop