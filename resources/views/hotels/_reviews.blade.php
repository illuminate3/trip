 <div class="row">
    <div class="medium-6 columns">
        @foreach($hotel->reviews as $review)
        <div class="row">
            <div class="medium-4 column">
                <h4><div class="rateYo-{{ $review->id }}"></div></h4>
                @if(! $review->user_id == '0')
                    <p><i class="fa fa-user"></i>&nbsp;{{ App\User::find($review->user_id)->first()->name }}</p>
                @else
                    <p><i class="fa fa-user"></i>&nbsp;Anonymous </p>
                @endif
            </div>
            <div class="medium-8 column">
                <p style="background-color: #ccc">Rating: {{ $review->rating }}</p>
            </div>
        </div>
        @endforeach
    </div>
    <div class="medium-6 columns">
        <?php
        $reviewableId = $hotel->id;
        $reviewableType = "Hotel";
        ?>
        {!! Form::open(['action' => 'ReviewsController@store','method' => 'POST']) !!}
        @include('reviews._form')
        {!! Form::close() !!}
    </div>
</div>

@section('script')
<script>
    @foreach($hotel->reviews as $review)
        $(".rateYo-"+{{ $review->id }}).rateYo({
            rating: {{ $review->rating }},
            halfStar: true,
            starWidth: "20px",
            starHeight: "20px"
          })
    @endforeach
</script>
@stop