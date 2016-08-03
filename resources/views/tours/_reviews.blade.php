 <div class="row">
    <?php
    $reviewableId = $tour->id;
    $reviewableType = "App\\Tour";
    ?>
    {!! Form::open(['action' => 'ReviewsController@store','method' => 'POST']) !!}
    @include('reviews._form')
    {!! Form::close() !!}
</div>
<div class="row">
    @foreach($tour->reviews as $review)
        <div class="col-md-12">
            <h4>Rating: {{ $review->rating }}</h4>
            <p>Rating: {{ $review->review }}</p>
        </div>
    @endforeach
</div>