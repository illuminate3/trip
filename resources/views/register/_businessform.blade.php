<div class="form-group">

    {!! Form::label('type','Select the type of business to register',[ 'class'=> 'control-label' ]) !!}
    {!! Form::select('type', [
        'hotel' => 'Hotel',
        'tour' => 'Tour',
        'venue' => 'Venue',
        'restaurant' => 'Restaurant',
        'vehicle' => 'Vehicle'
        ], ['class' => 'form-control' ]) !!}

    @if(count($errors->get('type')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('type') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('name','Business Name' ,['class' => 'control-label']) !!}
    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
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
    {!! Form::label('logo','Business Logo',['class' => 'control-label']) !!}
    {!! Form::file('logo', null,['class' => 'form-control']) !!}
    @if(count($errors->get('logo')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('logo') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>

<div class="form-group">
    {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
    {!! Form::textarea('description', old('description'), ['class' => 'form-control']) !!}
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

{!! Form::submit('Submit',['class' => 'btn btn-primary']) !!}
