@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>Edit Venues</h1>
    </div>
    <div class="row">
        {!! Form::model($venue, ['action'=>'VenuesControleer@update','method'=>'PUT','files' => true]) !!}
        @include('venues._form');
        {!! Form::close() !!}
    </div>
</div>
@stop
