@extends('layouts.homepage')

@section('title')
    Gallery Create
@stop

@section('content')
<section >
	<div class="section-wrap row">
        <div class="section-head">
            <h3>Upload a Photo into gallery</h3>
        </div>
		<div class="section-content">
		<div class="row">
        {!! Form::open(['method' => 'post', 'files' => true , 'route' => [ $model.'s.{slug}.gallery.store', $slug ], 'class'=>'medium-12 column']) !!}
        	@include('gallery._form')
        {!! Form::close() !!}
		</div>
		</div>
    </div>
</section>

@stop