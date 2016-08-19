@extends('layouts.dash')

@section('page-title')
    Hotel	
@stop

@section('page-description')
    Create Hotel
@stop

@section('content')
    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                 Create a new Hotel
            </h3>

            <div class="example-box-wrapper">
                {!! Form::open() !!}
                	@include('hotels._form')
                	@include('rooms._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop

@section('script')
   
@stop
