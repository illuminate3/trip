@extends('layouts.homepage')

@section('title')
    Rooms
@stop

@section('content')
    <div class="row">
        <section class="accomodation three-col-slider-wrap archive-wrap">
            <div class="section-wrap row">
                <div class="section-head">
                    <h3>Rooms Edit</h3>
                </div>
                <div class="section-content">
                    {!! Form::model($package,['action'=>'PackagesController@create']) !!}
                    @include('packages._form')
                    {!! Form::close() !!}
                </div>
            </div>
        </section>
    </div>

    </div>
@stop
