@extends('layouts.dash')

@section('page-title')
    Faq
@stop

@section('page-description')
    Edit a Question
@stop

@section('content')
    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                Edit Faq
            </h3>

            <div class="example-box-wrapper">
                {!! Form::model($faq,['class' => '']) !!}
                @include('faq._form')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@stop