@extends('layouts.dash')

@section('page-title')
    Carousel
@stop

@section('page-description')
    Create a Carousel
@stop

@section('content')
    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                Create Carousel for Homepage
            </h3>

            <div class="example-box-wrapper">
                {!! Form::open(['action'=>'CarouselsController@store','class' => 'col-md-12']) !!}
                    @include('carousel._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop