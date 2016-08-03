@extends('layouts.homepage')

@section('title')
    Venues
@stop

@section('content')
    <div class="body-wrap inside">
        <div class="content-wrap row">
            <div class="img-wrap small-12 large-6 columns">
                <img src="{{asset("uploads/images/venue/".$venue->logo)}}" alt="">
            </div>
            <div class="small-12 large-6 columns">
                <div class="section-title row">
                    <div class="float-left">
                        <h3>{{ $venue->name }}</h3>
                        <p>{{ $venue->contacts['address']}}</p>
                    </div>
                    <div class="float-right">
                        <div class="rateYo"></div>
                    </div>
                </div>
                <p>{{ $venue->description }}</p>
                @include('venues._contact')
            </div>
        </div>
        <div class="inside-gallery">
          @include('venues._gallery')
        </div>

        <div class="row">
            <div class="more-items">
               @include('venues._similar')
            </div>
        </div>
        <div class="row">
            @include('venues._reviews')
        </div>
        
    </div>
@stop
@section('script')
<script>
         $(".rateYo").rateYo({
            rating: {{ $venue->rating }},
            halfStar: true,
            starWidth: "20px",
            starHeight: "20px"
          });

    </script>
    @stop