@extends('layouts.homepage')

@section('title')
    All Business
@stop

@section('content')
    <div class="body-wrap profile business-profile">
        <div class="row collapse">
         @foreach($businesses as $key => $business)
         @if($business)
         {{--This $key generates name of the folder --}}
            <h4>{{ ucfirst($key) }}</h4>
         @endif
         <div class="row">
             
            @foreach($business as $value)
            <div class="columns medium-4 box">
                
                <li>Business name: {{$value['name'] }}</li>
                <li><img src="{{ asset('/uploads/images/'.$key.'/'.$value['logo']) }}" alt=""></li>
                <li>Business Image:: {{$value['description']}}</li>
                <a href="{{url($key.'s/'.$value['slug']) }}">More Info</a>
            </div>
            
            @endforeach
         </div>
         @endforeach
        </div> 

    </div>
@stop