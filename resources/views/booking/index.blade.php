@extends('layouts.homepage')

@section('title')
    Bookings
@stop

@section('content')
    <div class="body-wrap inside">
        <div class="content-wrap row">
        @foreach($bookings as $booking)
            <div class="columns medium-6">
                Bookee: {{ $booking->bookee}}
                <hr>
                Created At : {{ $booking->created_at->diffForHumans() }}
                <hr>
                Updated At : {{ $booking->updated_at->diffForHumans() }}
                <hr>
                Booked for : {{ $booking->to->diffInDays($booking->from)}} Days

                <hr>
                From Date: {{ $booking->from->format("d M Y") }}
                <hr>
                To Date: {{ $booking->to->format("d M Y") }}
            </div>
        @endforeach
        </div>

    </div>
@stop
