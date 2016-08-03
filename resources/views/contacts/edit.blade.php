@extends('layouts.homepage')

@section('title')
    Contact Information
@stop

@section('content')
    <div class="row">
        <section class="accomodation three-col-slider-wrap archive-wrap">
            <div class="section-wrap row">
                <div class="section-head">
                    <h3>Contacts Edit</h3>
                </div>
                <div class="section-content">
                    {!! Form::model($contact,['route'=> [$model.'s.{slug}.contact.update',$slug,$contact->id], 'method' => 'put']) !!}
                    @include('contacts._form')
                    {!! Form::close() !!}
                </div>
            </div>
        </section>
    </div>

    </div>
@stop
