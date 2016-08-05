@extends('layouts.profile')

@section('profile-content')
    <div class="add-business">
        <h4>Select Your Business type</h4>
        <hr>
        <div class="row categories">
            <div class="cat">
                <a href="{{ url('hotels/create') }}"><p><i class="fa fa-hotel"></i></p><p>Hotel</p></a>
            </div>
            <div class="cat">
                <a href="{{ url('venues/create') }}"><p><i class="fa fa-map-o"></i></p><p>Venue</p></a>
            </div>
            <div class="cat">
                <a href="{{ url('restaurants/create') }}"><p><i class="fa fa-cutlery"></i></p><p>restrurant</p></a>
            </div>
            <div class="cat">
                <a href="{{ url('tours/create') }}"><p><i class="fa fa-plane"></i></p><p>Tour</p></a>
            </div>
            <div class="cat">
                <a href="{{ url('vehicles/create') }}"><p><i class="fa fa-car"></i></p><p>vehicle</p></a>
            </div>
        </div>                                    
    </div>
@stop