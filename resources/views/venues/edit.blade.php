@extends('layouts.profile')
@section('profile-content')
<section class="container">
	<div class="section-wrap">
		
    <div class="row section-head">
        <h3>Edit Venue</h3>
    </div>
    <div class="row">
    	<div class="small-12 large-9 columns">
	        {!! Form::model($venue, ['action'=> ['VenuesController@edit',$venue->slug] ,'method'=>'PUT','files' => true]) !!}
        		@include('venues._form')
        	{!! Form::close() !!}
	    	<div class="small-12 large-3 columns">
	    		<ul>
	    			<li><a href="{{ url('venues/'.$venue->slug.'/gallery')}}" class="button expanded">Gallery</a></li>
	    			<li><a href="{{ url('venues/'.$venue->slug.'/contact')}}" class="button expanded">Contacts</a></li>
	    		</ul>
	    	</div>
    	</div>
	</div>
</section>
@stop