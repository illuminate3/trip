<div class="form-group">
    <span class="review-rate"></span>
    {!! Form::text('rating', old('rating'),['class' => 'show-for-sr','id'=>'rating']) !!}
    @if(count($errors->get('rating')) > 0)
        <div class="alert callout">
            <ul>
                @foreach($errors->get('rating') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    {{--!! Form::label('review', 'Review', ['class' => 'control-label']) !!--}}
    {!! Form::textarea('review', old('review')  , ['class' => 'form-control' ,'placeholder'=>'Write your review']) !!}
    @if(count($errors->get('review')) > 0)
        <div class="alert callout">
            <ul>
                @foreach($errors->get('review') as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    <input type="hidden" name="review_id" value="{{  $reviewableId ? $reviewableId : 'No reviewable Id' }}">
    <input type="hidden" name="review_model" value="{{  $reviewableType ? $reviewableType : 'No reviewable Id' }}">
    {{--<input type="hidden" name="user_id" value="{{ (Auth::check()) ? Auth::userId() : 1 }}">--}}

    {{--{!! Form::hiden('reviewable_id', $reviewableId ? $reviewableId : 'No reviewable Id') !!}
    {!! Form::hidden('user_id', Auth::check() ? Auth::userId() : 'Not Logged In' ) !!}
    {!! Form::hiden('reviewable_type', $reviewableType ? $reviewableType : 'No reviewable Type') !!}--}}
    {!! Form::submit( 'Submit', ['class' => 'button']) !!}
</div>
@section('review-script')
<script>
       $(".review-rate").rateYo({
        rating: 5,
        halfStar: true,
        starWidth: "50px",
        starHeight: "50px"
      }).on("rateyo.set", function (e, data) { 
        $('#rating').attr('value',data.rating);
      });
    

</script>
@stop