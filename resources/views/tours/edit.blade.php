@extends('layouts.profile')
@section('profile-content')


<section class="container">
	<div class="section-wrap">
		
    <div class="row section-head">
        <h3>Edit Tours</h3>
    </div>
    <div class="row">
    	<div class="small-12 large-9 columns">
    		
	        {!! Form::model($tour, ['action'=>['ToursController@update',$tour->slug],'method'=>'PUT','files' => true]) !!}
		    	    @include('tours._form');
	        {!! Form::close() !!}
    	</div>
    	<div class="small-12 large-3 columns">
    		<ul>
    			<li><a href="{{ url('tours/'.$tour->slug.'/gallery')}}" class="button expanded">Gallery</a></li>
    			<li><a href="{{ url('tours/'.$tour->slug.'/contact')}}" class="button expanded">Contacts</a></li>
    		</ul>
    	</div>
    </div>
	</div>
</section>
@stop
