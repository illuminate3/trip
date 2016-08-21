@extends('layouts.profile')

@section('profile-content')
    <div class="container">
        <div class="row">
            <h4>Gallery</h4>
            <a href="{{ url($model.'s/'.$slug.'/gallery/create') }}" class="button">Upload a picture</a>
            <div class="">
                @foreach($galleries->galleries as $gallery)
                    {!! Form::open([
                    'route'=>[ $model.'s.{slug}.gallery.destroy',$slug, $gallery->id],
                    'method' => 'DELETE'
                    ]) !!}

                        {!! Form::submit('Delete',['class' => 'button']) !!}


                    {!! Form::close() !!}
                      <a href="{{ url($model.'s/'.$slug.'/gallery/'.$gallery->id.'/edit')}}" title="{{ $gallery->title }}" description="{{$gallery->description}}"><img src="{{asset('uploads/images/gallery/th_'.$gallery->image)}}" width="150" height="150" ></a>
                @endforeach
            </div>

        </div>
    </div>
    @if(Shinobi::is('admin'))
        <a href="{{ route($models.'s.{slug}.gallery.create',[$slug]) }}" class="button">Add a new item for gallery</a>
    @endif
@stop
