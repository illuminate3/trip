@extends('layouts.profile')

@section('title')
    Rooms
@stop

@section('profile-content')
    <div class="row">
        <section class="accomodation three-col-slider-wrap archive-wrap">
            <div class="section-wrap row">
                <div class="section-head">
                    <h3>Rooms Edit</h3>
                </div>
                <div class="section-content">
                    {!! Form::model($room,['route'=>['hotels.{slug}.room.update',$slug,$id], 'method'=>'PUT','files'=>true]) !!}
                    @include('rooms._form')
                    {!! Form::close() !!}
                </div>
            </div>
        </section>
    </div>

    </div>
@stop
