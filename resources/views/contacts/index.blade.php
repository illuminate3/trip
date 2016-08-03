@extends('layouts.homepage')

@section('title')
    Contact Information
@stop

@section('content')
    <div class="body-wrap archive">
      
       <div class="row">
            <section >
                <div class="section-wrap row">
                    <div class="section-head">
                        <h3>Contact Details</h3>
                        <ul class="slider-nav">
                            <li class="prev-3"><i class="ti-angle-left"></i></li>
                            <li class="next-3"><i class="ti-angle-right"></i></li>
                        </ul>
                    </div>
                    <div class="section-content">
                        <ul class="archive-list">
                            <div class="row">
                            
                            <a href="{{url( $model.'s/'.$slug.'/contact/'.$contact->id.'/edit') }}">Edit</a>
                                <div class="small-12 medium-6 columns">
                                    <p>
                                        <a href="">
                                            <i class="fa fa-phone"></i> {{ $contact->phone1 }}
                                        </a>
                                    </p>
                                    <p>
                                        <a href="">
                                            <i class="fa fa-phone"></i> {{ $contact->phone2 }}
                                        </a>
                                    </p>
                                </div>
                                <div class="small-12 medium-6 columns">
                                    <p>
                                        <a href="mailto:{{ $contact->email}}">
                                            <i class="fa fa-envelope"></i> {{ $contact->email}}
                                        </a>
                                    </p>
                                    <p>
                                        <a href="">
                                            <i class="fa fa-globe"></i> {{ $contact->website}}
                                        </a>
                                    </p>  
                                    <a href="" class="button extended">Book Now </a>
                                </div>
                                <div class="small-12 medium-12 columns">
                                    <p>
                                        <i class="fa fa-user"></i> {{ $contact->representative}}
                                        {{ $contact->role}}
                                        
                                    </p>
                                    <p>
                                        <a href="https:\\facebook.com\{{ $contact->facebook}}">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </p>  
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </section>
        </div>

    </div>
@stop
