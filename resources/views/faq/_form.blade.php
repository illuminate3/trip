<div class="form-group">
    {!! Form::label('question','Question',['class' => 'control-label']) !!}
    {!! Form::text('question',old('question'),['class' => 'form-control']) !!}
    @if(count($errors->get('question')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('question') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('answer','Answer',['class' => 'control-label']) !!}
    {!! Form::textarea('answer',old('answer'),['class' => 'form-control']) !!}
    @if(count($errors->get('answer')) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('answer') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>
{{--<div class="form-group">
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
</div>--}}
<div class="form-group">
    {!! Form::label('order','Order',['class' => 'control-label']) !!}
    {!! Form::text('order',old('order'),['class' => 'form-control']) !!}
    @if(count($errors->get('order')) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('order') as $error)
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