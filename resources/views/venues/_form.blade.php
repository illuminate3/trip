{!! Form::label('name',"Name", ['class' => 'control-label']) !!}
{!! Form::text('name', (old('name')? old('name'): null),['class' => 'form-control']) !!}
    @if(count($errors->get('name')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('name') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif

{!! Form::label('slug',"Slug", ['class' => 'control-label']) !!}
{!! Form::text('slug',(old('slug')? old('slug'): null),['class' => 'form-control']) !!}
{{-- Validation rule error  --}}
    @if(count($errors->get('slug')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('slug') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif

{!! Form::label('image',"Logo", ['class' => 'control-label']) !!}
{!! Form::file('image',null,['class' => 'form-control']) !!}
{{-- Validation Errors --}}
@if(count($errors->get('image')) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->get('image') as $error)
                <li>{{ $error  }}</li>
            @endforeach
        </ul>
    </div>
@endif


{!! Form::label('description',"Description", ['class' => 'control-label']) !!}
{!! Form::textarea('description',(old('description')? old('description'): null ),['class' => 'form-control']) !!}
@if(count($errors->get('description')) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->get('description') as $error)
                <li>{{ $error  }}</li>
            @endforeach
        </ul>
    </div>
@endif


{!! Form::submit('Submit', ['class' => 'form-control btn btn-primary']) !!}
