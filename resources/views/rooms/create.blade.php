@extends('layouts.homepage')

@section('title')
    Rooms
@stop

@section('content')
    <div class="row">
            <section class="accomodation three-col-slider-wrap archive-wrap">
                <div class="section-wrap row">
                    <div class="section-head">
                        <h3>Rooms Create</h3>
                    </div>
                    <div class="section-content">
                       {!! Form::open(['route'=> ['hotels.{slug}.room.create',$slug],'method' => 'POST', 'files'=>true]) !!}
                            @include('rooms._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </section>
        </div>

    </div>
@stop
