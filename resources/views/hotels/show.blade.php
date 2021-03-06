@extends('layouts.homepage')

@section('title')
    Hotels
@stop

@section('content')
    <div class="body-wrap inside">
        <div class="content-wrap row">
            <div class="img-wrap small-12 large-6 columns">
                @include('hotels._gallery')
            </div>
            <div class="small-12 large-6 columns">
                <div class="section-title row">
                    {{-- <img src="{{asset("uploads/images/hotel/".$hotel->logo)}}" alt=""> --}}
                    <div class="float-left">
                        <h3>{{ $hotel->name }}</h3>
                        <p>{{ $hotel->contacts['address']}}</p>
                    </div>
                    <div class="float-right">
                        <div class="rateYo"></div>
                    </div>
                </div>
                <p>{{ $hotel->description }}</p>
                @include('hotels._contact')
            </div>
        </div>
        <div class="inside-gallery">
          
        </div>
        <div class="row">
            @include('hotels._room')
        </div>
        <div class="row">
            <div class="more-items">
               @include('hotels._similar')
            </div>
        </div>
        <div class="row">
            @include('hotels._reviews')
        </div>

    </div>
@stop
@section('scripts')
<script>
     $(".rateYo").rateYo({
        rating: {{ $hotel->rating }},
        halfStar: true,
        readOnly: true,
        starWidth: "20px",
        starHeight: "20px"
      });

</script>
@stop