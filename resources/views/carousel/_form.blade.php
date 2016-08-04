<div class="form-group">
    {!! Form::label('title','Carousel Title',['class' => 'control-label']) !!}
    {!! Form::text('title',old('title'),['class' => 'form-control']) !!}
    @if(count($errors->get('title')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('title') as $error)
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
    {!! Form::label('image','Image',['class' => 'control-label']) !!}
    {!! Form::file('image',['class' => 'form-control']) !!}
    @if(count($errors->get('image')) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('image') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>
<div class="form-group">
    {!! Form::label('position','Position',['class' => 'control-label']) !!}
    {!! Form::text('position',old('position'),['class' => 'form-control']) !!}
    @if(count($errors->get('position')) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('position') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>
<div class="form-group">
    {!! Form::label('status','Status',['class' => 'control-label']) !!}
    {!! Form::select('status',['0'=>'Inactive','1' => 'Active'],['class'=>'form-control']) !!}
    @if(count($errors->get('status')) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('status') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>
<div class="form-group">
    {!! Form::submit('Submit', ['class' => 'form-control btn btn-primary']) !!}
</div>