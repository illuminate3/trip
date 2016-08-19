@extends('layouts.profile')
@section('title')
    Vehicles | Transport
@stop

@section('profile-content')
    @foreach($vehicles->descriptions as $vehicle)
        <a href="{{ route('vehicles.{slug}.list.edit',[$slug,$vehicle->id ]) }}">

            <ul class="column medium-4">

                <li>Vehicle Type:{{$vehicle->type}}</li>
                <li>Number of Doors: {{ $vehicle->doors }}</li>
                <li>Air Conditioned ??: {{ ($vehicle->air_conditioned == '1') ? 'Yes' : 'No'}}</li>
                <li>Mileage Per liter: {{ ($vehicle->mileage) }}</li>
                <li>Manufacturer: {{ ($vehicle->manufacturer) }}</li>

            </ul>
        </a>

    @endforeach
@stop