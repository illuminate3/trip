@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>Edit Restaurants</h1>
    </div>
    <div class="row">
        {!! Form::model($restaurant, ['route'=>'restaurants.update','method'=>'PUT','files' => true]) !!}
        @include('restaurants._form');
        {!! Form::close() !!}
    </div>
</div>
@stop
