@extends('layouts.profile')
@section('profile-content')
<section class="container">
	<div class="section-wrap">
		
    <div class="row section-head">
        <h3>Edit Hotels</h3>
    </div>
    <div class="row">
    	<div class="small-12 large-9 columns">
    		
	        {!! Form::model($hotel, ['action'=>['HotelsController@update',$hotel->id ],'method'=>'PUT','files' => true]) !!}
	        @include('hotels._form')
	        {!! Form::close() !!}
    	</div>
    	<div class="small-12 large-3 columns">
    		<ul>
    			<li><a href="{{ url('hotels/'.$hotel->slug.'/gallery')}}" class="button expanded">Gallery</a></li>
                <li><a href="{{ url('hotels/'.$hotel->slug.'/room/create')}}" class="button expanded">Add Rooms</a></li>
    			<li><a href="{{ url('hotels/'.$hotel->slug.'/contact')}}" class="button expanded">Contacts</a></li>
    		</ul>
    	</div>
    </div>
	</div>
</section>
@stop
