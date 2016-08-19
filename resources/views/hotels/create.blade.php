@extends('layouts.profile')

@section('title')
    Hotel Create
@stop

@section('profile-content')
<section >
	<div class="section-wrap row">
        <div class="section-head">
            <h3>Create a Hotel</h3>
        </div>
		<div class="section-content">
    		<div class="row ajax-form" id="ajax-form">
                {!! Form::open(['action' => 'HotelsController@store','method'=>'post','files' => true]) !!}
                    @include('hotels._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</section>

@stop
