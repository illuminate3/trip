@extends('layouts.profile')

@section('title')
    Bookings
@stop

@section('profile-content')
    <div class="body-wrap inside">
        <div class="content-wrap row">
        <table>
            <thead>
                <th>Bookee</th>
                <th>Booked At</th>
                <th>Updated</th>
                <th>Days booked</th>
                <th>From</th>
                <th>To</th>
                <th>Options</th>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->bookee}}</td> 
                        <td>{{ $booking->created_at->diffForHumans() }}</td>
                        <td>{{ $booking->updated_at->diffForHumans() }}</td>
                        <td>{{ $booking->to->diffInDays($booking->from)}} Days</td>
                        <td>{{ $booking->from->format("d M Y") }}</td>
                        <td>{{ $booking->to->format("d M Y") }}</td> 
                        <td>
                        <div class="button-group">
                            <a href="#" class="button small" >Cancel</a>
                            <a href="#" class="button small" >View</a>
                        </div>
                        </td> 
                    </tr>
                @endforeach       
            </tbody>
        </table>
        
        </div>

    </div>
@stop
