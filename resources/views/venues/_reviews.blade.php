

 <div class="row">
    <div class="medium-6 columns">
        @foreach($venue->reviews as $review)
            <div class="col-md-12">
                <h4>Rating: <div class="rateYo-{{ $review->id }}"></div></h4>
                <p>Rating: {{ $review->review }}</p>
            </div>
        @endforeach
    </div>
    <div class="medium-6 columns">
        <?php
        $reviewableId = $venue->id;
        $reviewableType = "Venue";
        ?>
        {!! Form::open(['action' => 'ReviewsController@store','method' => 'POST']) !!}
        @include('reviews._form')
        {!! Form::close() !!}
    </div>
</div>

@section('scripts')
<script>
    @foreach($restaurant->reviews as $review)
        $(".rateYo-"+{{ $review->id }}).rateYo({
            rating: {{ $review->rating }},
            halfStar: true,
            starWidth: "20px",
            starHeight: "20px"
          })
    @endforeach
</script>
@stop