@extends('layouts.profile')
@section('profile-content')
<section class="container">
	<div class="section-wrap">
		
    <div class="row section-head">
        <h3>Edit Restaurant</h3>
    </div>
    <div class="row">
    	<div class="small-12 large-9 columns">
    		
	        {{!! Form::model($restaurant, ['route'=>'restaurants.update','method'=>'PUT','files' => true]) !!}
		        @include('restaurants._form');
	        {!! Form::close() !!}
        </div>
    	<div class="small-12 large-3 columns">
    		<ul>
    			<li><a href="{{ url('restaurants/'.$restaurant->slug.'/gallery')}}" class="button expanded">Gallery</a></li>
    			<li><a href="{{ url('restaurants/'.$restaurant->slug.'/contact')}}" class="button expanded">Contacts</a></li>
    		</ul>
    	</div>
    </div>
	</div>
</section>
@stop
