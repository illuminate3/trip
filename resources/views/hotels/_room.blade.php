<h1>Rooms</h1>
@foreach($hotel->rooms as $room)
	<div class="col-md-6">
		<p>Room Type: {{ $room->type }} </p>
		<p>Name: {{ $room->name }} </p>
		<p>Price: {{ $room->price }} </p>
		<p>Number Of Rooms: {{ $room->number_of_rooms }}</p>
		<p>Available Rooms: {{ $room->available_rooms }}</p>
		<p>Description: {{ str_limit($room->description, 50, '...') }}</p>
	</div>
@endforeach
<section class="accomodation three-col-slider-wrap archive-wrap">
    <div class="section-wrap row">
        <div class="section-head">
            <h3>Explore Rooms on this hotel</h3>

        </div>
        <div class="section-content">
            <ul class="archive-list">

                @foreach ($hotel->rooms as $room)

                    <li>
                        <div class="wrap">
                            <div class="img-wrap">
                                <img src="{{ asset('uploads/images/hotel/'.$room->image) }}" alt="">
                            </div>
                            <div class="long-desc">
                                <div class="row">
                                    <h4 class="float-left">{{ $room->type }}</h4>
                                    <div class="star float-right"></div>
                                </div>
                                <div class="row">
                                    <p class="address">{{ $room->contacts['address'] }}</p>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="float-left">
                                        <p>Price from</p>
                                    </div>
                                    <div class="float-right">
                                        <p> {{ $room->price }} </p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <p class="mb">{{ $room->number_of_rooms }}</p>
                                    <p class="mb">{{ $room->description }}</p>
                                    <a href="#" class="more-info">More info</a>
                                </div>
                                <div class="booking-div">
                                    <hr class="darker">
                                    <a href="{{ url('hotels/'.$hotel->slug.'/room')}}" class="button">Book Now </a>
                                </div>
                            </div>
                        </div>
                    </li>

                @endforeach

            </ul>
        </div>
    </div>
</section>