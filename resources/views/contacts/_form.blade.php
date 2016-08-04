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
src="https://maps.googleapis.com/maps/api/js?key={{ env("GOOGLE_API_KEY")}}&callback=initMap"></script>
<script>
      function initMap() {
        var myLatlng = {lat: -25.363, lng: 131.044};

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 4,
          center: myLatlng
        });

        var marker = new google.maps.Marker({
          position: myLatlng,
          map: map,
          title: 'Click to zoom'
        });

        map.addListener('center_changed', function() {
          // 3 seconds after the center of the map has changed, pan back to the
          // marker.
          window.setTimeout(function() {
            map.panTo(marker.getPosition());
          }, 3000);
        });

        marker.addListener('click', function() {
          map.setZoom(8);
          map.setCenter(marker.getPosition());
        });
      }
</script>


@stop