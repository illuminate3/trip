@extends('layouts.homepage')

@section('title')
    Rooms
@stop

@section('content')
    <div class="row">
            <section class="accomodation three-col-slider-wrap archive-wrap">
                <div class="section-wrap row">
                    <div class="section-head">
                        <h3>Create a new Transportation </h3>
                    </div>
                    <div class="section-content">
                       {!! Form::open([ 'route'=> ['vehicles.{slug}.list.store',$slug ],'method' => 'POST']) !!}
                            @include('vehicleDescription._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </section>
        </div>

    </div>
@stop
