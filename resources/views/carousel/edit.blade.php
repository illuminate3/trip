@extends('layouts.dash')

@section('page-title')
    Carousel
@stop

@section('page-description')
    Edit a Carousel
@stop

@section('content')
    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                Edit Carousel
            </h3>

            <div class="example-box-wrapper">
                {!! Form::model($carousel,['route'=>['dash.carousel.update',$carousel->id ], 'method'=>'put','files'=>true]) !!}
                @include('carousel._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop