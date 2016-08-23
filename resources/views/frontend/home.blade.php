@extends('layouts.homepage')

@section('title')
Homepage
@stop

@section('content')
<div class="body-wrap">
                <!-- BANNER  -->
                <section class="banner-wrap">
                    <div class="banner row align-middle">
                        <div class="content">
                            <h3>Neptrip Business Listing</h3>
                            <div class="row">
                                <?php foreach($carousels as $carousel) :?>

                                    <div class="medium-4 small-12 columns">
                                        <div class="content-item">
                                            <img src="{{ asset('uploads/carousel/'.$carousel->image) }}" alt="{{ $carousel->title }}" >
                                            <h4>{{ $carousel->title }}</h4>
                                            <p>{{ $carousel->description }}</p>   
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>                    
                </section>
                <!-- BANNER  -->

                <!-- search tabs -->
                <section class="search-box row">
                    <div class="wrap">
                        <ul class="tabs" data-tabs id="search-tabs">
                            <li class="tabs-title is-active"><a href="#hotel" aria-selected="true">Hotels</a></li>
                            <li class="tabs-title"><a href="#venue">venue</a></li>
                            <li class="tabs-title"><a href="#vehicle">vehicle</a></li>
                            <li class="tabs-title"><a href="#tours">tours</a></li>
                        </ul>
                        <div class="tabs-content" data-tabs-content="search-tabs">
                            <div class="tabs-panel is-active" id="hotel">
                                @include('frontend._searchform')
                            </div>
                            <div class="tabs-panel" id="venue">
                                @include('frontend._searchform')
                            </div>
                             <div class="tabs-panel" id="vehicle">
                                @include('frontend._searchform')
                            </div>
                             <div class="tabs-panel" id="tours">
                                 {!! QrCode::size(100)->generate('Neptrip'); !!}
                            </div>
                        </div>
                    </div>
                    
                </section>
                <!-- search tabs -->

                <!-- offers -->
                <section class="offer four-col-slider-wrap ">
                    <div class="section-wrap row">
                        <div class="section-head">
                            <h3>Explore our latest offer</h3>
                            <ul class="slider-nav">
                                <li class="prev"><i class="ti-angle-left"></i></li>
                                <li class="next"><i class="ti-angle-right"></i></li>
                            </ul>
                        </div>
                        <div class="section-content">                            
                            <ul class="four-col-slider">

                                @foreach (range(0, 6) as $key)

                                    <li>
                                        <div class="wrap">
                                            <div class="img-wrap">
                                                <img src="{{ asset('neptrip/images/car.png') }}" alt="">
                                            </div>
                                            <div class="desc">
                                                <h4>We offer Premium Hotels</h4>
                                                <hr>
                                                <a href="" class="button">More Info</a>
                                            </div>              
                                        </div>
                                    </li>

                                @endforeach

                            </ul>
                        </div>

                        <a href="/offers/" class="view-more">View More >>></a>
                    </div>
                </section>
                <!-- offers -->

                <!-- accomodation -->
                <section class="accomodation three-col-slider-wrap ">
                    <div class="section-wrap row">
                        <div class="section-head">
                            <h3>Explore our latest accomodation</h3>
                            <ul class="slider-nav">
                                <li class="prev-3"><i class="ti-angle-left"></i></li>
                                <li class="next-3"><i class="ti-angle-right"></i></li>
                            </ul>
                        </div>
                        <div class="section-content">
                            <ul class="three-col-slider">

                                @foreach ($hotels as $hotel)

                                    <li>
                                        <div class="wrap">
                                            <div class="img-wrap">
                                                <img src="{{ asset('/uploads/images/hotel/'.$hotel->logo) }}" alt="">
                                            </div>
                                            <div class="long-desc">
                                                <div class="row">
                                                    <h4 class="float-left">{{ $hotel->name }}</h4>
                                                    <div class="star float-right"><div class="rateYo"></div></div>
                                                </div>
                                                @if($hotel->contacts)
                                                    <div class="row">
                                                        <p class="address">{{ $hotel->contacts['address'] }}</p>
                                                    </div>
                                                @endif
                                                <hr>
                                                <div class="row">
                                                    <div class="float-left">
                                                        <p>Price from</p>
                                                    </div>
                                                    <div class="float-right rate">
                                                        <p> {{ $hotel->price_from }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <p class="mb">{{ $hotel->description }}</p>
                                                    <a href="#" class="more-info">More info</a>
                                                </div>
                                                <div class="booking-div">
                                                    <hr class="darker">
                                                    <a href="{{ url('hotels/'.$hotel->slug)}}" class="button">Book Now</a>
                                                </div>
                                            </div>              
                                        </div>
                                    </li>

                                @endforeach
                                
                            </ul>
                        </div>
                        <a href="{{ url('/hotels/') }}" class="view-more">View More >>></a>
                    </div>                   
                </section>
                <!-- accomodation -->

                <!-- Tours -->
                <section class="tours four-col-slider-wrap ">
                    <div class="section-wrap row">
                        <div class="section-head">
                            <h3>Explore our latest tours</h3>
                            <ul class="slider-nav">
                                <li class="prev"><i class="ti-angle-left"></i></li>
                                <li class="next"><i class="ti-angle-right"></i></li>
                            </ul>
                        </div>
                        <div class="section-content">
                            <ul class="four-col-slider">

                               @foreach ($tours as $tour)   

                                    <li>
                                        <div class="wrap">
                                            <div class="img-wrap">
                                                <img src="{{ asset('/uploads/images/tour/'.$tour->logo) }}" alt="">
                                            </div>
                                            <div class="long-desc">
                                                <div class="row">
                                                    <h4 class="float-left">
                                                    <!-- We offer Premium Hotels -  -->
                                                    {{ $tour->name }}
                                                    </h4>
                                                    <div class="star float-right"><div class="rateYo"></div></div>
                                                </div>
                                                @if($hotel->contacts)
                                                <div class="row">
                                                    <p class="address">{{ $tour->contacts['address']}}</p>
                                                </div>
                                                @endif
                                                <hr>
                                                <div class="row">
                                                    <div class="float-left">
                                                        <p>Price from</p>
                                                    </div>
                                                    <div class="float-right">
                                                        <p>{{ $tour->price_from }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <p>{{ $tour->description }}</p>
                                                    <a href="#" class="more-info">More info</a>
                                                </div>
                                                <div class="booking-div">
                                                    <hr class="darker">
                                                    <a href="{{ url('tours/'.$tour->slug)}}" class="button">Book Now</a>
                                                </div>
                                            </div>              
                                        </div>
                                    </li>

                                @endforeach
                                
                            </ul>
                        </div>
                        <a href="{{ url('/tours/') }}" class="view-more">View More >>></a>
                    </div>
                </section>
                <!-- Tours -->

                <!-- vehicles -->
                <section class="vehicles three-col-slider-wrap ">
                    <div class="section-wrap row">
                        <div class="section-head">
                            <h3>Explore our latest Vehicles</h3>
                            <ul class="slider-nav">
                                <li class="prev-3"><i class="ti-angle-left"></i></li>
                                <li class="next-3"><i class="ti-angle-right"></i></li>
                            </ul>
                        </div>
                        <div class="section-content">
                            <ul class="three-col-slider">
                                
                                @foreach ($vehicles as $vehicle)

                                    <li>
                                        <div class="wrap">
                                            <div class="img-wrap">
                                                <img src="{{ asset('/uploads/images/vehicle/'.$vehicle->logo ) }}" alt="">
                                            </div>
                                            <div class="long-desc">
                                                <div class="row">
                                                    <h4 class="float-left">{{ $vehicle->name }}</h4>
                                                    <div class="star float-right"><div class="rateYo"></div></div>
                                                </div>
                                                {{--@if($hotel->contacts)
                                                <div class="row">
                                                    <p class="address">{{ $room->hotels->contacts['address'] }}</p>
                                                </div>
                                                @endif--}}
                                                <hr>
                                                <div class="row">
                                                    <div class="float-left">
                                                        <p>Price from</p>
                                                    </div>
                                                    <div class="float-right">
                                                        <p>{{ $vehicle->price_from }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <p class="mb">{{ $vehicle->description }}</p>
                                                    <a href="#" class="more-info">More info</a>
                                                </div>
                                                <div class="booking-div">
                                                    <hr class="darker">
                                                    <a href="{{ url('vehicles/'.$vehicle->slug)}}" class="button">Book Now</a>
                                                </div>
                                            </div>              
                                        </div>
                                    </li>

                                @endforeach
                                
                            </ul>
                        </div>
                        <a href="{{ url('/vehicles') }}" class="view-more">View More >>></a>
                    </div>
                </section>
                <!-- vehicles -->

                 <!-- blog -->
                <section class="blog four-col-slider-wrap ">
                    <div class="section-wrap row">
                        <div class="section-head">
                            <h3>Explore our latest Blog</h3>
                            <ul class="slider-nav">
                                <li class="prev"><i class="ti-angle-left"></i></li>
                                <li class="next"><i class="ti-angle-right"></i></li>
                            </ul>
                        </div>
                        <div class="section-content">                            
                            <ul class="four-col-slider">

                                @foreach (range(0, 6) as $key)

                                    <li>
                                        <div class="wrap">
                                            <div class="img-wrap">
                                                <img src="{{ asset('neptrip/images/car.png') }}" alt="">
                                            </div>
                                            <div class="desc">
                                                <h4>We offer Premium Hotels</h4>
                                                <hr>
                                                <a href="" class="button">More Info</a>
                                            </div>              
                                        </div>
                                    </li>

                                @endforeach

                            </ul>
                        </div>

                        <a href="{{ url('/blog/')  }} " class="view-more">View More >>></a>
                    </div>
                </section>
                <!-- blog -->

               

            </div>
@stop