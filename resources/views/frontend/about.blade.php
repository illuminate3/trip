@extends('layouts.homepage')

@section('title')
    About
@stop

@section('content')
    <div class="body-wrap inside">
        <div class="content-wrap row">
            <div class="img-wrap small-12 large-6 columns">
                <img src="{{ asset('neptrip/images/car.png') }}" alt="">
            </div>
            <div class="small-12 large-6 columns">
                <div class="section-title row">
                    <div class="float-left">
                        <h3>Hotel Title</h3>
                        <p>Address Lorem ipsum, Nepal</p>
                    </div>
                    <div class="float-right">
                        <div class="rateYo"></div>
                    </div>                        
                </div>
                <div class="row">
                    <p class="float-left">Avilable rooms</p>
                    <p class="float-right">Price form: <span>$299.39</span></p>                        
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi voluptas autem maxime, minima, doloribus porro cumque quo id earum consectetur minus voluptates expedita eaque beatae saepe ullam alias similique placeat! Nihil nostrum hic expedita maxime autem, consequuntur iure neque praesentium.</p>
                <div class="row">
                    <div class="small-12 medium-6 columns">
                        <a href="">
                            <i class="fa fa-phone"></i> +977871242731                            
                        </a>
                        </p>
                        <a href="">
                            <i class="fa fa-phone"></i> +977871242731                            
                        </a>
                        </p>
                    </div>
                    <div class="small-12 medium-6 columns">
                        <a href="">
                            <i class="fa fa-envelope"></i> info@gmail.com
                        </a>
                        <a href="" class="button extended">Book Now </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="inside-gallery">
            <div class="row">
                <div class="section-title">
                    <h3>View Gallery</h3>
                    
                </div>
                <div class="popup-gallery">
                    <a href="http://farm9.staticflickr.com/8242/8558295633_f34a55c1c6_b.jpg" title="The Cleaner"><img src="http://farm9.staticflickr.com/8242/8558295633_f34a55c1c6_s.jpg" width="75" height="75"></a>
                    <a href="http://farm9.staticflickr.com/8382/8558295631_0f56c1284f_b.jpg" title="Winter Dance"><img src="http://farm9.staticflickr.com/8382/8558295631_0f56c1284f_s.jpg" width="75" height="75"></a>
                    <a href="http://farm9.staticflickr.com/8225/8558295635_b1c5ce2794_b.jpg" title="The Uninvited Guest"><img src="http://farm9.staticflickr.com/8225/8558295635_b1c5ce2794_s.jpg" width="75" height="75"></a>
                    <a href="http://farm9.staticflickr.com/8383/8563475581_df05e9906d_b.jpg" title="Oh no, not again!"><img src="http://farm9.staticflickr.com/8383/8563475581_df05e9906d_s.jpg" width="75" height="75"></a>
                    <a href="http://farm9.staticflickr.com/8235/8559402846_8b7f82e05d_b.jpg" title="Swan Lake"><img src="http://farm9.staticflickr.com/8235/8559402846_8b7f82e05d_s.jpg" width="75" height="75"></a>
                    <a href="http://farm9.staticflickr.com/8235/8558295467_e89e95e05a_b.jpg" title="The Shake"><img src="http://farm9.staticflickr.com/8235/8558295467_e89e95e05a_s.jpg" width="75" height="75"></a>
                    <a href="http://farm9.staticflickr.com/8378/8559402848_9fcd90d20b_b.jpg" title="Who's that, mommy?"><img src="http://farm9.staticflickr.com/8378/8559402848_9fcd90d20b_s.jpg" width="75" height="75"></a>
                </div>
            </div>                    
        </div>

        <div class="row">
            <div class="more-items">
                <section class="accomodation three-col-slider-wrap archive-wrap">
                <div class="section-wrap row">
                    <div class="section-head">
                        <h3>Explore Simillar Hotels</h3>
                        
                    </div>
                    <div class="section-content">
                        <ul class="archive-list">

                            @foreach ($hotels as $hotel)

                                <li>
                                    <div class="wrap">
                                        <div class="img-wrap">
                                            <img src="{{ asset('uploads/images/hotel/'.$hotel->logo) }}" alt="">
                                        </div>
                                        <div class="long-desc">
                                            <div class="row">
                                                <h4 class="float-left">{{ $hotel->title }}</h4>
                                                <div class="star float-right"></div>
                                            </div>
                                            <div class="row">
                                                <p class="address">{{ $hotel->contacts['address'] }}</p>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="float-left">
                                                    <p>Price from</p>
                                                </div>
                                                <div class="float-right">
                                                    <p> {{ $hotel->price_from }} </p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <p class="mb">{{ $hotel->description }}</p>
                                                <a href="#" class="more-info">More info</a>
                                            </div>
                                            <div class="booking-div">
                                                <hr class="darker">
                                                <a href="{{ url('hotels/'.$hotel->slug)}}" class="button">Book Now </a>
                                            </div>
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

    </div>
@stop