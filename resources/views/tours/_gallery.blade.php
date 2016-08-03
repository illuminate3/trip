<h3>Gallery</h3>
@foreach($tour->galleries as $gallery)
    <div class="col-md-6">
        <h6>{{$gallery->title}}</h6>
        <img src="{{$gallery->image}}" alt="" class="img-thumbnail img-responsive">

        <p>{{$gallery->description}}</p>
    </div>
@endforeach