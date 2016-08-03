<div class="form-group">
    {!! Form::label('name','Name :',['class' => 'control-label']) !!}
    {!! Form::text('name',old('name'),['class' => 'form-control']) !!}
    @if(count($errors->get('name')) > 0)
            <div class="alert caption">
                <ul>
                    @foreach($errors->get('name') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>
<div class="form-group">
    {!! Form::label('image','Upload',['class' => 'button']) !!}
    {!! Form::file('image',['class' => 'show-for-sr']) !!}
    @if(count($errors->get('image')) > 0)
            <div class="alert caption">
                <ul>
                    @foreach($errors->get('image') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>
<div class="form-group">
    {!! Form::label('type','type',['class' => 'control-label']) !!}
    {!! Form::text('type',old('type'),['class' => 'form-control']) !!}
    @if(count($errors->get('type')) > 0)
            <div class="alert caption">
                <ul>
                    @foreach($errors->get('type') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>
<div class="form-group">
    {!! Form::label('price','price',['class' => 'control-label']) !!}
    {!! Form::text('price',old('price'),['class' => 'form-control']) !!}
    @if(count($errors->get('price')) > 0)
            <div class="alert caption">
                <ul>
                    @foreach($errors->get('price') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>

<div class="form-group">
    {!! Form::label('description','Description',['class' => 'control-label']) !!}
    {!! Form::textarea('description',old('description'),['class' => 'form-control']) !!}
    @if(count($errors->get('description')) > 0)
            <div class="alert caption">
                <ul>
                    @foreach($errors->get('description') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>
<div class="form-group">
    {!! Form::label('number_of_rooms','Number of Rooms',['class' => 'control-label']) !!}
    {!! Form::text('number_of_rooms',old('number_of_rooms'),['class' => 'form-control']) !!}
    @if(count($errors->get('number_of_rooms')) > 0)
            <div class="alert caption">
                <ul>
                    @foreach($errors->get('number_of_rooms') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>
<div class="form-group">
    {!! Form::label('available_rooms','Available Rooms',['class' => 'control-label']) !!}
    {!! Form::text('available_rooms',old('available_rooms'),['class' => 'form-control']) !!}
    @if(count($errors->get('available_rooms')) > 0)
            <div class="alert caption">
                <ul>
                    @foreach($errors->get('available_rooms') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>
<div class="form-group">
    {!! Form::submit('Submit',['class' => 'button']) !!}
</div>
