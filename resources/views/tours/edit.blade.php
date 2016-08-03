@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>Edit tours</h1>
    </div>
    <div class="row">
        {!! Form::model($tour, ['action'=>'ToursController@update','method'=>'PUT','files' => true]) !!}
        @include('tours._form');
        {!! Form::close() !!}
    </div>
</div>
@stop
