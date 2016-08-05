@extends('layouts.profile')

@section('profile-content')
    <div class="body-wrap " id="ajax-form">
        <div class="row collapse">
             @foreach($businesses as $key => $business)
             @if($business)
             {{--This $key generates name of the folder --}}
             <div class="section-head">
                <h3>{{ ucfirst($key) }}</h3>                 
             </div>
             @endif
             <div class="row">
                 
                @foreach($business as $value)
                <div class="columns medium-3 box">
                    <a href="{{url($key.'s/'.$value['slug'].'/edit') }}">                 
                        <li class="img-wrap">
                            <img src="{{ asset('/uploads/images/'.$key.'/'.$value['logo']) }}" alt="">
                            <div class="img-overlay">
                                <i class="fa fa-edit"></i>
                            </div>
                        </li>
                        <li>{{$value['name'] }}</li>
                    </a>
                </div>
                
                @endforeach
             </div>
             @endforeach
        </div> 

    </div>
@stop