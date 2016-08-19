@extends('layouts.profile')
@section('title')

@stop

@section('profile-content')
    <section>
        <div class="section-wrap">
            <div class="section-head">
                <h3>Welcome {{ $user->name }}</h3>
                
            </div>
            @if(Shinobi::is('business'))
            <p>Welcome to neptrip. You are currently registered as a business user. </p>
            <p>You can add a new business <a href="{{ url('profile\add') }}">here</a>.</p>
            @endif
            @if(Shinobi::is('admin'))
            <p>Welcome Admin on this page you can add or remove businesses</p>
            @endif
        </div>
    </section>
                    
                    
@stop