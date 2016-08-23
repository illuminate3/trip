@extends('layouts.profile')

@section('title')
    Rooms
@stop

@section('profile-content')
    <div class="row">
        <section class="accomodation three-col-slider-wrap archive-wrap">
            <div class="section-wrap row">
                <div class="section-head">
                    <h3>Transport Edit</h3>
                </div>
                <div class="section-content">
                    {!! Form::model($vehicle,['route'=>['vehicles.{slug}.list.update',$slug,$id], 'method'=>'PUT','files'=>true]) !!}
                    @include('vehicleDescription._form')
                    {!! Form::close() !!}
                </div>
            </div>
        </section>
    </div>

    </div>
@stop
