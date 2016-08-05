@extends('layouts.profile')

@section('title')
    Gallery Create
@stop

@section('profile-content')
<section >
	<div class="section-wrap row">
        <div class="section-head">
            <h3>Edit your gallery</h3>
        </div>
		<div class="section-content">
		<div class="row">
        {!! Form::model($gallery->galleries[0] ,['method' => 'put', 'files' => true , 'route' => [ $model.'s.{slug}.gallery.update', $slug, $id ], 'class'=>'medium-12 column']) !!}
        	@include('gallery._form')
        {!! Form::close() !!}
		</div>
		</div>
    </div>
</section>

@stop