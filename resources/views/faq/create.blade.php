@extends('layouts.dash')

@section('page-title')
    FAQ
@stop

@section('page-description')
    Create a FAQ
@stop

@section('content')
    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                Create a new question
            </h3>

            <div class="example-box-wrapper">
                {!! Form::open([ 'action'=>'FaqController@store','class' => 'col-md-12', 'method' => 'post','files'=> true ]) !!}
                    @include('faq._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop