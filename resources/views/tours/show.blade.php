@extends('layouts.app')
@section('content')
    <div class="container">
        <aside class="col-md-4">
            @include('tours._contact')
            @include('tours._reviews')
        </aside>
        <div class="col-md-7 col-md-offset-1">
            <div class="row">
                <img src="{{$tour->logo}}" alt="" class="img-responsive">
            </div>
            <div class="row">
                <h1>{{ $tour->name }}</h1>

                <p>{{ $tour->description }}</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @include('tours._gallery')
                </div>
                <div class="col-md-12">
                    @include('tours._packages')
                </div>
            </div>


        </div>
    </div>
@stop
