@extends('layouts.profile')

@section('profile-content')
        <div class="row">
        <ul>
            @foreach($bookings as $booking)
                <li>{{ $booking->bokee }}</li>               
            @endforeach
        </ul>
        </div> 
@stop