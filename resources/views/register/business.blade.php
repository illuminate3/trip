@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <h1>Register a Business Account</h1>

            {!! Form::open(['action'=> 'UserRegistrationController@businessRegister','class' => 'col-md-12','files' => true]) !!}
                @include('register._businessform')
            {!! Form::close() !!}
        </div>
    </div>
@stop
