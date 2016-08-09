@extends('layouts.homepage')

@section('title')
@stop

@section('content')
 <div class="row" >
            <section class="accomodation three-col-slider-wrap archive-wrap">
                <div class="section-wrap row">
                    <div class="section-head">
                        <h3>Search Results for {{ ucfirst($type)}}s</h3>
                        <ul class="slider-nav">
                            <li class="prev-3"><i class="ti-angle-left"></i></li>
                            <li class="next-3"><i class="ti-angle-right"></i></li>
                        </ul>
                    </div>
                    <div class="section-content" id="ajax-form">
                        <ul class="archive-list">
							
                            @foreach ($search as $s)

                                <li>
                                    <div class="wrap">
                                        <div class="img-wrap">
                                           <img src="{{ asset('uploads/images/'.$type.'/'.$s->logo) }}" alt=""> 
                                        </div>
                                        <div class="long-desc">
                                            <div class="row">
                                                <h4 class="float-left">{{ $s->name }}</h4>
                                                <div class="star float-right"></div>
                                            </div>
                                            <div class="row">
                                                <p class="address">{{ $s->contacts['address'] }}</p>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="float-left">
                                                    <p>Price from</p>
                                                </div>
                                                <div class="float-right">
                                                    <p> {{ $s->price_from }} </p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <p class="mb">{{ $s->description }}</p>
                                                <a href="#" class="more-info">More info</a>
                                            </div>
                                            <hr class="darker">
                                            <a href="{{ url($type.'s/'.$s->slug)}}" class="button">More Info</a>
                                        </div>
                                    </div>
                                </li>

                            @endforeach

                        </ul>
                    </div>
                </div>
            </section>
        </div>
@stop