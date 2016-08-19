@extends('layouts.profile')

@section('title')
    Contact Information
@stop

@section('profile-content')
    <div class="row">
        <section class="accomodation three-col-slider-wrap archive-wrap">
            <div class="section-wrap row">
                <div class="section-head">
                    <h3>Contacts Edit for {{ ucfirst($contact->name) }}</h3>
                </div>
                <div class="section-content">
                    {!! Form::model($contact->contacts,['route'=> [$model.'s.{slug}.contact.update',$slug,$id], 'method' => 'put']) !!}
                        @include('contacts._form')
                    {!! Form::close() !!}
                </div>
            </div>
        </section>
    </div>

    </div>
@stop
