@extends('layouts.homepage')

@section('content')
    <div class="container">
        <div class="row">
            <h4>Gallery</h4>

            <div class="popup-gallery">
                @foreach($galleries->galleries as $gallery)                
                      <a href="{{asset('uploads/images/gallery/'.$gallery->image)}}" title="{{ $gallery->title }}" description="{{$gallery->description}}"><img src="{{asset('uploads/images/gallery/th_'.$gallery->image)}}" width="150" height="150" ></a></li>
                @endforeach
            </div>

        </div>
    </div>
@stop
