<div class="row">
    <div class="slider-for">
        @foreach($restaurant->galleries as $gallery)
            <a href="{{ asset('/uploads/images/gallery/'.$gallery->image) }}" title="{{ $gallery->title }}"><img src="{{ asset('/uploads/images/gallery/th_'.$gallery->image)}}" width="75" height="75"></a>
        @endforeach
    </div>
    <div class="slider-nav">
        @foreach($restaurant->galleries as $gallery)
            <a href="{{ asset('/uploads/images/gallery/'.$gallery->image) }}" title="{{ $gallery->title }}"><img src="{{ asset('/uploads/images/gallery/th_'.$gallery->image)}}" width="75" height="75"></a>
        @endforeach
    </div>
</div>