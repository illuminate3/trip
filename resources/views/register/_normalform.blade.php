<div class="form-group">
    {!! Form::label('username','Username',['class' => 'control-label']) !!}
    {!! Form::text('username',old('username'),['class' => 'form-control']) !!}
    @if(count($errors->get('username')) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('username') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif 
</div>
<div class="form-group">
    {!! Form::label('password','Password',['class' => 'control-label']) !!}
    {!! Form::password('password',null,['class' => 'form-control']) !!}
    @if(count($errors->get('password')) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('password') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>
<div class="form-group">
    {!! Form::label('re_password','Confirm Password',['class' => 'control-label']) !!}
    {!! Form::password('re_password',null,['class' => 'form-control']) !!}
    @if(count($errors->get('re_password')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('re_password') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::submit('Submit',['class'=>'btn btn-primary'] ) !!}
</div>