@extends('layouts.homepage')

@section('title')
    Tours
@stop

@section('content')
    <div class="body-wrap inside">
        <div class="content-wrap row">
            <div class="img-wrap small-12 large-6 columns">
                <img src="{{asset("uploads/images/tour".$tour->logo)}}" alt="">
            </div>
            <div class="small-12 large-6 columns">
                <div class="section-title row">
                    <div class="float-left">
                        <h3>{{ $tour->name }}</h3>
                        <p>{{ $tour->contacts['address']}}</p>
                    </div>
                    <div class="float-right">
                        <div class="rateYo"></div>
                    </div>
                </div>
                <p>{{ $tour->description }}</p>
                @include('tours._contact')
            </div>
        </div>
        <div class="inside-gallery">
          @include('tours._gallery')
        </div>

        <div class="row">
            <div class="more-items">
               @include('tours._similar')
            </div>
        </div>
        <div class="row">
            @include('tours._reviews')
        </div>

    </div>
@stop
@section('scripts')
<script>
     $(".rateYo").rateYo({
        rating: {{ $tour->rating }},
        halfStar: true,
        starWidth: "20px",
        starHeight: "20px"
      });

</script>
@stop