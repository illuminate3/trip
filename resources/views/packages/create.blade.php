@extends('layouts.homepage')

@section('title')
    Packages
@stop

@section('content')
    <div class="row">
            <section class="accomodation three-col-slider-wrap archive-wrap">
                <div class="section-wrap row">
                    <div class="section-head">
                        <h3>Create Packages</h3>
                    </div>
                    <div class="section-content">
                       {!! Form::open([ 'route'=> [ 'tours.{slug}.package.store', $slug ] , 'method'=>'POST','files' => true ]) !!}
                            @include('packages._form')
                        {!! Form::close() !!}
                    </div>
                </div>
            </section>
        </div>

    </div>
@stop
