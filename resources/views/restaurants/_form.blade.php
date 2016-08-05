<div class="form-group">
    {!! Form::label('name',"Name", ['class' => 'control-label']) !!}
    {!! Form::text('name', old('name') ,['class' => 'form-control']) !!}
    @if(count($errors->get('name')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('name') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('slug',"Slug", ['class' => 'control-label']) !!}
    {!! Form::text('slug',old('slug') ,['class' => 'form-control']) !!}
    @if(count($errors->get('slug')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('slug') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    @if(isset($restaurant) && $restaurant->logo)
        <img src="{{ asset('/uploads/images/restaurant/'.$restaurant->logo ) }}" class="th img-thumbnail" alt="">
    @else
        {!! Form::label('image',"Logo", ['class' => 'control-label']) !!}
        {!! Form::file('image',null,['class' => 'form-control']) !!}
        @if(count($errors->get('image')) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('image') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    @endif
</div>
<div class="form-group">
    {!! Form::label('description',"Description", ['class' => 'control-label']) !!}
    {!! Form::textarea('description',old('description') ,['class' => 'form-control']) !!}
    @if(count($errors->get('description')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('description') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::submit('Submit', ['class' => 'form-control btn btn-primary']) !!}
</div>