 
 <div class="row">
 
    <div class="section-title">
        <h3>View Gallery</h3>
        @if(Auth::check())
		    @if( $venue->user_id == Auth::user()->id || (Shinobi::is('admin')) )
		    	<a href="{{url('venues/'.$venue->slug.'/gallery/create')}}">Add a new image in gallery</a>
		    @endif
	    @endif

    </div>
    <div class="popup-gallery">
    @foreach($venue->galleries as $gallery)
        <a href="{{ asset('/uploads/images/gallery/'.$gallery->image) }}" title="{{ $gallery->title }}"><img src="{{ asset('/uploads/images/gallery/th_'.$gallery->image)}}" width="75" height="75"></a>
    @endforeach
    </div>
    



</div>