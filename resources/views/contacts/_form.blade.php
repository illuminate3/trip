<div class="form-group">
    {!! Form::label('zone','Zone :',['class' => 'control-label']) !!}
    {!! Form::text('zone',old('zone'),['class' => 'form-control']) !!}
    @if(count($errors->get('zone')) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->get('zone') as $error)
                <li>{{ $error  }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('district','District',['class' => 'control-label']) !!}
    {!! Form::text('district',old('district'),['class' => 'control-label']) !!}
    @if(count($errors->get('district')) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->get('district') as $error)
                <li>{{ $error  }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('representative','Representative',['class' => 'control-label']) !!}
    {!! Form::text('representative',old('representative'),['class' => 'form-control']) !!}
    @if(count($errors->get('representative')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('representative') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('role','role',['class' => 'control-label']) !!}
    {!! Form::text('role',old('role'),['class' => 'form-control']) !!}
    @if(count($errors->get('role')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('role') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('address','Address :',['class' => 'control-label']) !!}
    {!! Form::text('address',old('address'),['class' => 'form-control', 'id' => 'search-map']) !!}
    <div class="map" style="height:200px !important"></div>
    @if(count($errors->get('address')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('address') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('phone1','Phone No 1:',['class' => 'control-label']) !!}
    {!! Form::text('phone1',old('phone1'),['class' => 'form-control']) !!}
    @if(count($errors->get('phone1')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('phone1') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('phone2','Phone No 2:',['class' => 'control-label']) !!}
    {!! Form::text('phone2',old('phone2'),['class' => 'form-control']) !!}
    @if(count($errors->get('phone2')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('phone2') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<div class="form-group">
    {!! Form::label('mobile','Mobile:',['class' => 'control-label']) !!}
    {!! Form::text('mobile',old('mobile'),['class' => 'form-control']) !!}
    @if(count($errors->get('mobile')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('mobile') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('email','Email:',['class' => 'control-label']) !!}
    {!! Form::email('email',old('email'),['class' => 'form-control']) !!}
    @if(count($errors->get('email')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('email') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('fax','Fax :',['class' => 'control-label']) !!}
    {!! Form::text('fax',old('fax'),['class' => 'form-control']) !!}
    @if(count($errors->get('fax')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('fax') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('facebook','Facebook :',['class' => 'control-label']) !!}
    {!! Form::text('facebook',old('facebook'),['class' => 'form-control']) !!}
    @if(count($errors->get('facebook')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('facebook') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('website','Website :',['class' => 'control-label']) !!}
    {!! Form::text('website',old('website'),['class' => 'form-control']) !!}
    @if(count($errors->get('website')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('website') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('latitude','Latitude :',['class' => 'control-label']) !!}
    {!! Form::text('latitude',old('latitude'),['class' => 'form-control']) !!}
    @if(count($errors->get('latitude')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('latitude') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('longitude','Longitude :',['class' => 'control-label']) !!}
    {!! Form::text('longitude',old('longitude'),['class' => 'form-control']) !!}
    @if(count($errors->get('longitude')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('longitude') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::submit('Submit',['class' => 'button']) !!}
</div>

@section('scripts')
<script async defer
src="https://maps.googleapis.com/maps/api/js?key={{ env("GOOGLE_API_KEY")}}&callback=initialize"></script>
<script>
    function initialize() {
      var mapOptions = {
        center: {lat: -33.8688, lng: 151.2195},
        zoom: 13,
        scrollwheel: false
      };
      var map = new google.maps.Map(document.getElementById('map'),
        mapOptions);

      var input = /** @type {HTMLInputElement} */(
          document.getElementById('pac-input'));

      // Create the autocomplete helper, and associate it with
      // an HTML text input box.
      var autocomplete = new google.maps.places.Autocomplete(input);
      autocomplete.bindTo('bounds', map);

      map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

      var infowindow = new google.maps.InfoWindow();
      var marker = new google.maps.Marker({
        map: map
      });
      google.maps.event.addListener(marker, 'click', function() {
        infowindow.open(map, marker);
      });

      // Get the full place details when the user selects a place from the
      // list of suggestions.
      google.maps.event.addListener(autocomplete, 'place_changed', function() {
        infowindow.close();
        var place = autocomplete.getPlace();
        if (!place.geometry) {
          return;
        }

        if (place.geometry.viewport) {
          map.fitBounds(place.geometry.viewport);
        } else {
          map.setCenter(place.geometry.location);
          map.setZoom(17);
        }

        // Set the position of the marker using the place ID and location.
        marker.setPlace(/** @type {!google.maps.Place} */ ({
          placeId: place.place_id,
          location: place.geometry.location
        }));
        marker.setVisible(true);

        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
            'Place ID: ' + place.place_id + '<br>' +
            place.formatted_address + '</div>');
        infowindow.open(map, marker);
      });
    }

    // Run the initialize function when the window has finished loading.
    google.maps.event.addDomListener(window, 'load', initialize);
</script>


@stop