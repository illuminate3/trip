<section class="accomodation three-col-slider-wrap archive-wrap">
    <div class="section-wrap row">
        <div class="section-head">
            <h3>Explore Simillar venues</h3>

        </div>
        <div class="section-content">
            <ul class="archive-list">

                @foreach ($venues as $venue)

                    <li>
                        <div class="wrap">
                            <div class="img-wrap">
                                <img src="{{ asset('uploads/images/venue/'.$venue->logo) }}" alt="">
                            </div>
                            <div class="long-desc">
                                <div class="row">
                                    <h4 class="float-left">{{ $venue->title }}</h4>
                                    <div class="star float-right"></div>
                                </div>
                                <div class="row">
                                    <p class="address">{{ $venue->contacts['address'] }}</p>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="float-left">
                                        <p>Price from</p>
                                    </div>
                                    <div class="float-right">
                                        <p> {{ $venue->price_from }} </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <p class="mb">{{ $venue->description }}</p>
                                    <a href="#" class="more-info">More info</a>
                                </div>
                                <div class="booking-div">
                                    <hr class="darker">
                                    <a href="{{ url('venues/'.$venue->slug)}}" class="button">Book Now </a>
                                </div>
                            </div>
                        </div>
                    </li>

                @endforeach

            </ul>
        </div>
    </div>
</section>