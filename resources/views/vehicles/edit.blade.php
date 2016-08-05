@extends('layouts.profile')
@section('profile-content')
<section class="container">
	<div class="section-wrap">
		
    <div class="row section-head">
        <h3>Edit Vehicle</h3>
    </div>
    <div class="row">
    	<div class="small-12 large-9 columns">
    		
	        {!! Form::model($vehicle, [ 'action'=> ['VehiclesController@update',$vehicle->id] ,'method'=>'PUT','files' => true]) !!}
        	@include('vehicles._form')
        {!! Form::close() !!}
        </div>
    	<div class="small-12 large-3 columns">
    		<ul>
    			<li><a href="{{ url('vehicles/'.$vehicle->slug.'/gallery')}}" class="button expanded">Gallery</a></li>
    			<li><a href="{{ url('vehicles/'.$vehicle->slug.'/contact')}}" class="button expanded">Contacts</a></li>
    		</ul>
    	</div>
    
	</div>
	</div>
</section>
@stop
