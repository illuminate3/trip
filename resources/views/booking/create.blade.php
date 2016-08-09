@extends('layouts.homepage')

@section('title')
    Bookings
@stop

@section('content')
    <div class="body-wrap inside">
        <div class="content-wrap row">
            {!! Form::open() !!}
            <div class="columns medium-6">
                <div class="form-group">
                {!! Form::label('bokee','Bookee') !!}
                    {!! Form::text('bookee',( Auth::check() ) ? Auth::user()->name : old('bokee'),['placeholder' => 'Bookee']) !!}
                </div>
                {!! From::select('hotel',$hotels)}
            </div>
            {!! Form::close() !!}
        </div>

    </div>
@stop
