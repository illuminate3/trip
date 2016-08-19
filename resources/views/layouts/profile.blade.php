@extends('layouts.homepage')

@section('title')
    profile
@stop

@section('content')
    <div class="body-wrap profile business-profile">
        <div class="row collapse">
            <div class="medium-2 columns">
                <ul class="sideNav">
                    <li><a href="{{url('/profile')}}">Profile</a></li>
                    <li><a href="{{url('/profile/add')}}">Add a Business</a></li>
                    <li><a href="{{url('/profile/offer')}}">Offers</a></li>
                    <li><a href="{{url('/profile/offer/create')}}">Add an Offer</a></li>
                    <li><a href="{{url('/profile/business')}}">All Business</a></li>
                    <li><a href="{{url('/profile/booking')}}">Booking History  <span class="badge float-right">1</span></a></a></li>
                    <li><a href="{{url('/logout')}}">Logout</a></li>
                </ul>
            </div>
            <div class="medium-10 profile-content columns">
                @yield('profile-content')                
          </div>
        </div> 

    </div>
@stop