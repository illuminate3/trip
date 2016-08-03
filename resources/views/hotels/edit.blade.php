@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>Edit Hotels</h1>
    </div>
    <div class="row">
        {!! Form::model($hotel, ['action'=>['HotelsController@update',$hotel->id ],'method'=>'PUT','files' => true]) !!}
        @include('hotels._form');
        {!! Form::close() !!}
    </div>
</div>
@stop
