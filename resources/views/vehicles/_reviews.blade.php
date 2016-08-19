<div class="row">
    <div class="medium-6 columns review-div">
        @foreach($vehicle->reviews as $review)
        <div class="callout">  

            <div class="row"> 
                <div class="small-3 large-2 columns">
                    <div class="img-wrap">
                        <i class="fa fa-user"></i> 
                    </div>                    
                </div>
                <div class="small-9 large-10 columns">
                <div class="row">
                    @if(! $review->user_id == '0')
                        <p class="float-left">{{ App\User::find($review->user_id)->first()->name }}</p>
                    @else
                        <p class="float-left">Anonymous </p>
                    @endif                    
                    <h4 class="float-right"><div class="rateYo-{{ $review->id }}"></div></h4>                    
                </div>
                    <p style="padding:5px;">{{ $review->review }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="medium-6 columns">
        <?php
        $reviewableId = $vehicle->id;
        $reviewableType = "Vehicle";
        ?>
        {!! Form::open(['action' => 'ReviewsController@store','method' => 'POST']) !!}
        @include('reviews._form')
        {!! Form::close() !!}
    </div>
</div>

@section('script')
<script>
    @foreach($vehicle->reviews as $review)
        $(".rateYo-"+{{ $review->id }}).rateYo({
            rating: {{ $review->rating }},
            fullStar: true,
            readOnly: true,
            starWidth: "20px",
            starHeight: "20px"
          })
    @endforeach
</script>
@stop