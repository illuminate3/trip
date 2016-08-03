@extends('layouts.homepage')

@section('title')
    Vehicle
@stop

@section('content')
    <div class="body-wrap inside">
        <div class="content-wrap row">
            <div class="img-wrap small-12 large-6 columns">
                <img src="{{asset("uploads/images/vehicle/".$vehicle->logo)}}" alt="">
            </div>
            <div class="small-12 large-6 columns">
                <div class="section-title row">
                    <div class="float-left">
                        <h3>{{ $vehicle->name }}</h3>
                        <p>{{ $vehicle->contacts['address']}}</p>
                    </div>
                    <div class="float-right">
                        <div class="rateYo"></div>
                    </div>
                </div>
                <p>{{ $vehicle->description }}</p>
                @include('vehicles._contact')
            </div>
        </div>
        <div class="inside-gallery">
          @include('vehicles._gallery')
        </div>

        <div class="row">
            <div class="more-items">
               @include('vehicles._similar')
            </div>
        </div>
        <div class="row">
            @include('vehicles._reviews')
        </div>

    </div>
@stop
@section('scripts')
<script>
     $(".rateYo").rateYo({
        rating: {{ $vehicle->rating }},
        halfStar: true,
        starWidth: "20px",
        starHeight: "20px"
      });

</script>
@stop
