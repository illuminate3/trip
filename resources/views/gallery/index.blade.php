@extends('layouts.profile')

@section('profile-content')
    <div class="container">
        <div class="row">
            <h4>Gallery</h4>
            <a href="{{ url($model.'s/'.$slug.'/gallery/create') }}" class="button">Upload a picture</a>
            <div class="">
                @foreach($galleries->galleries as $gallery)  
          
                      <a href="{{ url($model.'s/'.$slug.'/gallery/'.$gallery->id.'/edit')}}" title="{{ $gallery->title }}" description="{{$gallery->description}}"><img src="{{asset('uploads/images/gallery/th_'.$gallery->image)}}" width="150" height="150" ></a></li>
                @endforeach
            </div>

        </div>
    </div>
@stop
