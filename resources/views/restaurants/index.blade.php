@extends('layouts.homepage')

@section('title')
    Restaurants
@stop

@section('content')
    <div class="body-wrap archive">
        <div class="archive-banner">
            <div class="content row">
                <h3>Search Restaurants</h3>
                <div class="tabs-content">
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

        <div class="row">
            <section class="accomodation three-col-slider-wrap archive-wrap">
                <div class="section-wrap row">
                    <div class="section-head">
                        <h3>Explore our latest Restaurants</h3>
                        <ul class="slider-nav">
                            <li class="prev-3"><i class="ti-angle-left"></i></li>
                            <li class="next-3"><i class="ti-angle-right"></i></li>
                        </ul>
                    </div>
                    <div class="section-content">
                        <ul class="archive-list">

                            @foreach ($restaurants as $restaurant)

                                <li>
                                    <div class="wrap">
                                        <div class="img-wrap">
                                            <img src="{{ asset('uploads/images/restaurant'.$restaurant->logo) }}" alt="">
                                        </div>
                                        <div class="long-desc">
                                            <div class="row">
                                                <h4 class="float-left">{{ $restaurant->title }}</h4>
                                                <div class="star float-right"></div>
                                            </div>
                                            <div class="row">
                                                <p class="address">{{ $restaurant->contacts['address'] }}</p>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="float-left">
                                                    <p>Price from</p>
                                                </div>
                                                <div class="float-right">
                                                    <p> {{ $restaurant->price_from }} </p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <p class="mb">{{ $restaurant->description }}</p>
                                                <a href="#" class="more-info">More info</a>
                                            </div>
                                            <hr class="darker">
                                            <a href="{{ url('restaurants/'.$restaurant->slug)}}" class="button">More Info</a>
                                        </div>
                                    </div>
                                </li>

                            @endforeach

                        </ul>
                    </div>
                </div>
            </section>
        </div>

    </div>
@stop
