@extends('layouts.profile')


@section('profile-content')
    <section>
        <div class="section-wrap">
            <div class="section-head">
                <h3>Welcome {{ $user->name }}</h3>
                
            </div>
            @if(Shinobi::is('business'))
            <p>Welcome to neptrip. You are currently registered as a business user. You can add your business here.</p>
            @endif
            @if(Shinobi::is('admin'))
            <p>Welcome Admin on this page you can add or remove businesses</p>
            @endif
        </div>
    </section>
                    
                    
@stop