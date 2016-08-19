@if(count($errors))
    @foreach($errors as $error)
        {{$err}}
    @endforeach
@endif
<div class="form-group">
    {!! Form::label('name',"Name", ['class' => 'control-label']) !!}
    {!! Form::text('name', old('name'),['class' => 'form-control']) !!}
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
<div class="form-group float-right">
    {!! Form::label('description',"Description", ['class' => 'control-label']) !!}
    {!! Form::textarea('description', old('description'),['class' => 'form-control']) !!}
    @if(count($errors->get('desctiption')) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('desctiption') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>
<div class="form-group">

    {!! Form::label('slug',"Slug", ['class' => 'control-label']) !!}
    {!! Form::text('slug',old('slug'),['class' => 'form-control']) !!}
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
    @if(isset($vehicle) && $vehicle->logo)
        <img src="{{ asset('/uploads/images/vehicle/'.$vehicle->logo ) }}" class="th img-thumbnail" alt="">
    @else
        {!! Form::label('image',"Upload", ['class' => 'button']) !!}
        {!! Form::file('image',['class' => 'show-for-sr']) !!}
        @if(count($errors->get('image')) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('image') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif{{--Error --}}
        
    @endif
</div>
<div class="form-group">
    {!! Form::submit('Submit', ['class' => 'button']) !!}
</div>
