@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Register a Normal Account</h1>
            {!! Form::open(['class' => 'form-horizontal col-md-12']) !!}
                @include('register._normalform')
            {!! Form::close() !!}
        </div>
    </div>
@stop