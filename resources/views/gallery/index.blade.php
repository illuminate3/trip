@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @foreach($galleries->galleries as $gallery)
                <div class="col-md-6">
                    <a href="{{ url('/gallery/'.$gallery->id) }}">
                      <h4>{{ $gallery->title }}</h4>
                    </a>
                    <img src="{{asset('uploads/images/gallery/'.$gallery->image)}}" alt="" class="img-responsive">
                </div>
            @endforeach

        </div>
    </div>
@stop
