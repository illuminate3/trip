@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <h1>Restaurants</h1>
    </div>
    <div class="row">
        {!! Form::open(['action' => 'RestaurantsController@store','files' => true]) !!}
            @include('restaurants._form');
        {!! Form::close() !!}
    </div>
</div>
@stop