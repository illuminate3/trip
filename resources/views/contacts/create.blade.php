@extends('layouts.homepage')

@section('title')
    Contact Information
@stop

@section('content')
    <div class="row">
            <section class="accomodation three-col-slider-wrap archive-wrap">
                <div class="section-wrap row">
                    <div class="section-head">
                        <h3>Create Contact information</h3>
                    </div>
                    <div class="section-content">
                        {!! Form::open(['method' => 'post', 'files' => true , 'route' => [ $model.'s.{slug}.contact.store', $slug ], 'class'=>'row form-horizontal']) !!}
                        @include('contacts._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </section>
        </div>

    </div>
@stop
