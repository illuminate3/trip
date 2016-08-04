@extends('layouts.homepage')

@section('title')
    All Business
@stop

@section('content')
    <div class="body-wrap profile business-profile">
        <div class="row collapse">
         @foreach($businesses as $business)
            <li>Business name: {{$business['name']}}</li>
            
         @endforeach
        </div> 

    </div>
@stop