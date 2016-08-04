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
                                <?php foreach(range(0, 2) as $key) :?>

                                    <div class="medium-4 small-12 columns">
                                        <div class="content-item">
                                            <img src="{{ asset('neptrip/images/online-icon.png') }}" alt="">
                                            <h4>Online Services</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis, dolor repellendus voluptatem accusamus eius animi. Alias nulla, consequuntur molestias doloremque hic sint, reiciendis possimus exercitationem?</p>   
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
                                <form action="" class="search-form row small-up-1 medium-up-2 large-up-4">                                   
                                    <div class="column">
                                        <input type="text" placeholder="enter city">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="check in">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="check out">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="room-type">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="adults">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="children">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="rooms">
                                    </div>
                                    <div class="column">
                                        <submit class="button expanded">Search</submit>
                                    </div>
                                </form>
                            </div>
                            <div class="tabs-panel" id="venue">
                                <form action="" class="search-form row small-up-1 medium-up-2 large-up-4">                                   
                                    <div class="column">
                                        <input type="text" placeholder="enter city">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="check in">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="check out">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="room-type">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="adults">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="children">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="rooms">
                                    </div>
                                    <div class="column">
                                        <submit class="button expanded">Search</submit>
                                    </div>
                                </form>
                            </div>
                             <div class="tabs-panel" id="vehicle">
                                <form action="" class="search-form row small-up-1 medium-up-2 large-up-4">                                   
                                    <div class="column">
                                        <input type="text" placeholder="enter city">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="check in">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="check out">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="room-type">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="adults">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="children">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="rooms">
                                    </div>
                                    <div class="column">
                                        <submit class="button expanded">Search</submit>
                                    </div>
                                </form>
                            </div>
                             <div class="tabs-panel" id="tours">
                                <form action="" class="search-form row small-up-1 medium-up-2 large-up-4">                                   
                                    <div class="column">
                                        <input type="text" placeholder="enter city">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="check in">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="check out">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="room-type">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="adults">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="children">
                                    </div>
                                    <div class="column">
                                        <input type="text" placeholder="rooms">
                                    </div>
                                    <div class="column">
                                        <submit class="button expanded">Search</submit>
                                    </div>
                                </form>
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
                                                    <h4 class="float-left">{{ $hotel->title }} hotel title</h4>
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
                                                        <p> {{ $hotel->price_from }} $323.99</p>
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
                        <a href="/hotels/" class="view-more">View More >>></a>
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
                                                    <a href="{{ url('hotels/'.$hotel->slug)}}" class="button">Book Now</a>
                                                </div>
                                            </div>              
                                        </div>
                                    </li>

                                @endforeach
                                
                            </ul>
                        </div>
                        <a href="/tours/" class="view-more">View More >>></a>
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
                                
                                @foreach ($rooms as $room)

                                    <li>
                                        <div class="wrap">
                                            <div class="img-wrap">
                                                <img src="{{ $room->image }}" alt="">
                                            </div>
                                            <div class="long-desc">
                                                <div class="row">
                                                    <h4 class="float-left">We offer Premium Hotels</h4>
                                                    <div class="star float-right"><div class="rateYo"></div></div>
                                                </div>
                                                @if($hotel->contacts)
                                                <div class="row">
                                                    <p class="address">{{ $room->hotels->contacts['address'] }}</p>
                                                </div>
                                                @endif
                                                <hr>
                                                <div class="row">
                                                    <div class="float-left">
                                                        <p>Price from</p>
                                                    </div>
                                                    <div class="float-right">
                                                        <p>{{ $room->price_from }}</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <p class="mb">{{ $room->description }}</p>
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
                        <a href="/Vehicles/" class="view-more">View More >>></a>
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

                        <a href="/blog/" class="view-more">View More >>></a>
                    </div>
                </section>
                <!-- blog -->

               

            </div>
@stop