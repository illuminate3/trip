{!! Form::label('title','Title',['class' => 'form-label']) !!}
{!! Form::text('title', old('title') ? old('title') : null, ['class' => 'form-control'] ) !!}
@if(count($errors->get('title')) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->get('title') as $error)
                <li>{{ $error  }}</li>
            @endforeach
        </ul>
    </div>
@endif


{!! Form::label('content','Content',['class' => 'form-label']) !!}
{!! Form::textarea('content', old('content') ? old('content') : null, ['class' => 'form-control']) !!}
@if(count($errors->get('content')) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->get('content') as $error)
                <li>{{ $error  }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::submit('Submit' , [ 'class' => 'btn btn-primary']) !!}