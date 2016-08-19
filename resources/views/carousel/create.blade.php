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
                {!! Form::open([ 
                    'route'=>'dash.carousel.store',
                    'class' => 'col-md-12', 
                    'id' => 'carousel-form',
                    'method' => 'POST',
                    'files'=> true 
                    ]) !!}
                    
                    @include('carousel._form')

                {!! Form::close() !!}
            </div>
        </div>
    </div>
     

     <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\PostCarouselRequest','#carousel-form') !!}
@stop