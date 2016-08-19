 
<div id="ajax-load" class="row">
    
 @foreach ($hotels as $hotel)

    <li>
        <div class="wrap">
            <div class="img-wrap">
                <img src="{{ asset('uploads/images/hotel/'.$hotel->logo) }}" alt="">
            </div>
            <div class="long-desc">
                <div class="row">
                    <h4 class="float-left">{{ $hotel->title }}</h4>
                    <div class="star float-right"></div>
                </div>
                <div class="row">
                    <p class="address">{{ $hotel->contacts['address'] }}</p>
                </div>
                <a href="{{ url('hotels/'.$hotel->slug.'/edit')}}" class="button" id="edit-form">Edit</a>
            </div>
        </div>
    </li>

@endforeach
</div>