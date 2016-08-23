<div class="row">
    <div class="slider-for">
        @foreach($tour->galleries as $gallery)
            <a href="{{ asset('/uploads/images/gallery/'.$gallery->image) }}" title="{{ $gallery->title }}"><img src="{{ asset('/uploads/images/gallery/th_'.$gallery->image)}}" width="75" height="75"></a>
        @endforeach
    </div>
    <div class="slider-nav">
        @foreach($tour->galleries as $gallery)
            <a href="{{ asset('/uploads/images/gallery/'.$gallery->image) }}" title="{{ $gallery->title }}"><img src="{{ asset('/uploads/images/gallery/th_'.$gallery->image)}}" width="75" height="75"></a>
        @endforeach
    </div>
</div>