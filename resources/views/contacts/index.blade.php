@extends('layouts.profile')

@section('title')
    Contact Information
@stop

@section('profile-content')
    <div class="body-wrap archive">
      
       <div class="row">
            <section >
                <div class="section-wrap row">
                    <div class="section-head">
                        <h3>Contact Details</h3>

                    </div>
                    <div class="section-content">
                        <ul class="archive-list">
                            <div class="row">
                            @if(count($contact) > 0)
                                <a href="{{url( $model.'s/'.$slug.'/contact/'.$contact->id.'/edit') }}" class="button">Edit Contact</a>
                                <ul class="small-12 medium-12 columns">
                                    <li>
                                        <span>Primary Phone : <i class="fa fa-phone"></i> {{ $contact->phone1 }}</span> 
                                        
                                    </li>
                                    <li>
                                        <span>Alternate Phone : <i class="fa fa-phone"></i> {{ $contact->phone2 }}</span>
                                    </li>
                                
                                
                                    <li>
                                        <span>
                                            Email : <i class="fa fa-envelope"></i> {{ $contact->email}}
                                        </span>
                                        
                                    </li>
                                    <li>
                                        <span>
                                            Website: <i class="fa fa-globe"></i> {{ $contact->website}}
                                        </span>
                                    </li>  
                                    
                                    <li>
                                        <span>
                                            Representative : <i class="fa fa-user"></i> {{ $contact->representative}}
                                        </span>
                                        
                                    </li>
                                    <li>
                                        <span>
                                            Role : <i class="fa fa-user"></i> {{ $contact->role}}
                                        </span>
                                    </li>
                                    <li> 
                                        <span>
                                            Facebook: {{ $contact->facebook}}
                                        </span>
                                    </li>  
                                </ul>
                            @else
                                @if(Auth::check())
                                <a href="{{ url($model.'s/'.$slug.'/contact/create') }}" > Create a Contact information for your business</a>
                                @endif
                            @endif
                            </div>
                        </ul>
                    </div>
                </div>
            </section>
        </div>

    </div>
@stop
