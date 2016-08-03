@extends('layouts.homepage')

@section('title')
    blog
@stop

@section('content')
    <div class="body-wrap blog-page">
        <div class="row">
           <section class="accomodation three-col-slider-wrap blog-wrap">
                <div class="section-wrap row">
                    <div class="section-head">
                        <h3>Our blog</h3>
                    </div>
                    <div class="section-content">
                        <ul class="archive-list">

                            @foreach ($hotels as $hotel)

                                <li>
                                    <div class="wrap">
                                        <div class="img-wrap">
                                            <img src="{{ asset('neptrip/images/car.png') }}" alt="">  
                                        </div>
                                        <div class="long-desc">
                                            <div class="row">
                                                <h4 class="float-left">{{ $hotel->title }} Blog title</h4>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <p class="mb">{{ $hotel->description }}</p>
                                            </div>
                                            <hr class="darker">
                                            <a href="" class="button">More Info</a>
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