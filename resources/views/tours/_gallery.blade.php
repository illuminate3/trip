 <div class="row">
    <div class="section-title">
        <h3>View Gallery</h3>

    </div>
    <div class="popup-gallery">
    @foreach($tour->galleries as $gallery)
        <a href="{{ asset('/uploads/images/gallery/'.$gallery->image) }}" title="{{ $gallery->title }}"><img src="{{ asset('/uploads/images/gallery/th_'.$gallery->image)}}" width="75" height="75"></a>
    @endforeach
    </div>
</div>