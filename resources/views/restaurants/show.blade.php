@extends('layouts.homepage')

@section('title')
    Restaurant
@stop

@section('content')
    <div class="body-wrap inside">
        <div class="content-wrap row">
            <div class="img-wrap small-12 large-6 columns">
                <img src="{{asset("uploads/images/restaurant".$restaurant->logo)}}" alt="">
            </div>
            <div class="small-12 large-6 columns">
                <div class="section-title row">
                    <div class="float-left">
                        <h3>{{ $restaurant->name }}</h3>
                        <p>{{ $restaurant->contacts['address']}}</p>
                    </div>
                    <div class="float-right">
                        <div class="rateYo"></div>
                    </div>
                </div>
                <p>{{ $restaurant->description }}</p>
                @include('restaurants._contact')
            </div>
        </div>
        <div class="inside-gallery">
          @include('restaurants._gallery')
        </div>

        <div class="row">
            <div class="more-items">
               @include('restaurants._similar')
            </div>
        </div>
        <div class="row">
            @include('restaurants._reviews')
        </div>

    </div>
@stop
@section('scripts')
<script>
     $(".rateYo").rateYo({
        rating: {{ $restaurant->rating }},
        halfStar: true,
        starWidth: "20px",
        starHeight: "20px"
      });

</script>
@stop