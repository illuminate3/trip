@extends('layouts.homepage')

@section('title')
    Hotels
@stop

@section('content')
    <div class="body-wrap archive">
        <div class="archive-banner">
            <div class="content row">
                <h3>Search Hotels</h3>
                <div class="tabs-content">
                    <form action="" class="search-form row small-up-1 medium-up-2 large-up-4">
                        <div class="column">
                            <input type="text"  placeholder="enter city">
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
          <input id="pac-input" class="controls" type="text"
        placeholder="Enter a location">
        <div id="type-selector" class="controls">
          <input type="radio" name="type" id="changetype-all" checked="checked">
          <label for="changetype-all">All</label>

          <input type="radio" name="type" id="changetype-establishment">
          <label for="changetype-establishment">Establishments</label>

          <input type="radio" name="type" id="changetype-address">
          <label for="changetype-address">Addresses</label>

          <input type="radio" name="type" id="changetype-geocode">
          <label for="changetype-geocode">Geocodes</label>
        </div>
        <div id="map"></div>

        </div>

        <div class="row" >
            <section class="accomodation three-col-slider-wrap archive-wrap">
                <div class="section-wrap row">
                    <div class="section-head">
                        <h3>Explore our latest Hotels</h3>
                        <ul class="slider-nav">
                            <li class="prev-3"><i class="ti-angle-left"></i></li>
                            <li class="next-3"><i class="ti-angle-right"></i></li>
                        </ul>
                    </div>
                    <div class="section-content" id="ajax-form">
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
                                            <hr class="darker">
                                            <a href="{{ url('hotels/'.$hotel->slug)}}" class="button">More Info</a>
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
@section('scripts')
<style >
#map {
        height: 100%;
      }
      .controls {
        margin-top: 10px;
        border: 1px solid transparent;
        border-radius: 2px 0 0 2px;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        height: 32px;
        outline: none;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
      }

      #pac-input {
        background-color: #fff;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        margin-left: 12px;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 300px;
      }

      #pac-input:focus {
        border-color: #4d90fe;
      }

      .pac-container {
        font-family: Roboto;
      }

      #type-selector {
        color: #fff;
        background-color: #4d90fe;
        padding: 5px 11px 0px 11px;
      }

      #type-selector label {
        font-family: Roboto;
        font-size: 13px;
        font-weight: 300;
      }
</style>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyALK8mxkBzOnXI1DG4QoXrZtks_58JbRKE&libraries=places&callback=initMap"
     async defer></script>
     <script type="text/javascript">
     function initMap() {
       var map = new google.maps.Map(document.getElementById('map'), {
         center: {lat: -33.8688, lng: 151.2195},
         zoom: 13
       });
       var input = /** @type {!HTMLInputElement} */(
         document.getElementById('pac-input'));

         var types = document.getElementById('type-selector');
         map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
         map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

         var autocomplete = new google.maps.places.Autocomplete(input);
         autocomplete.bindTo('bounds', map);

         var infowindow = new google.maps.InfoWindow();
         var marker = new google.maps.Marker({
           map: map,
           anchorPoint: new google.maps.Point(0, -29)
         });

         autocomplete.addListener('place_changed', function() {
           infowindow.close();
           marker.setVisible(false);
           var place = autocomplete.getPlace();
           if (!place.geometry) {
             window.alert("Autocomplete's returned place contains no geometry");
             return;
           }

           // If the place has a geometry, then present it on a map.
           if (place.geometry.viewport) {
             map.fitBounds(place.geometry.viewport);
           } else {
             map.setCenter(place.geometry.location);
             map.setZoom(17);  // Why 17? Because it looks good.
           }
           marker.setIcon(/** @type {google.maps.Icon} */({
             url: place.icon,
             size: new google.maps.Size(71, 71),
             origin: new google.maps.Point(0, 0),
             anchor: new google.maps.Point(17, 34),
             scaledSize: new google.maps.Size(35, 35)
           }));
           marker.setPosition(place.geometry.location);
           marker.setVisible(true);

           var address = '';
           if (place.address_components) {
             address = [
             (place.address_components[0] && place.address_components[0].short_name || ''),
             (place.address_components[1] && place.address_components[1].short_name || ''),
             (place.address_components[2] && place.address_components[2].short_name || '')
             ].join(' ');
           }

           infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
             infowindow.open(map, marker);
           });

           // Sets a listener on a radio button to change the filter type on Places
           // Autocomplete.
           function setupClickListener(id, types) {
             var radioButton = document.getElementById(id);
             radioButton.addEventListener('click', function() {
               autocomplete.setTypes(types);
             });
           }

           setupClickListener('changetype-all', []);
           setupClickListener('changetype-address', ['address']);
           setupClickListener('changetype-establishment', ['establishment']);
           setupClickListener('changetype-geocode', ['geocode']);
         }

    </script>

@stop
