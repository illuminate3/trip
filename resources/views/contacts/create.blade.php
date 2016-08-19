@extends('layouts.profile')

@section('title')
    Contact Information
@stop

@section('profile-content')
    <div class="row">
            <section class="accomodation three-col-slider-wrap archive-wrap">
                <div class="section-wrap row">
                    <div class="section-head">
                        <h3>Create Contact information of {{ ucfirst($model) }} for {{ ucfirst($slug) }}</h3>
                    </div>
                    
                    <div class="section-content">
                        {!! Form::open([
                            'method' => 'POST', 
                            'files' => true , 
                            'route' => [ $model.'s.{slug}.contact.store', $slug ], 
                            'class'=>'row'
                            ]) !!}
                            
                            @include('contacts._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </section>
        </div>

    </div>
@stop
