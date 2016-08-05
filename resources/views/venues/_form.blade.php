{!! Form::label('name',"Name", ['class' => 'control-label']) !!}
{!! Form::text('name', old('name'),['class' => 'form-control']) !!}
    @if(count($errors->get('name')) > 0)
        <div class="alert callout">
            <ul>
                @foreach($errors->get('name') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif

{!! Form::label('slug',"Slug", ['class' => 'control-label']) !!}
{!! Form::text('slug',old('slug'),['class' => 'form-control']) !!}
{{-- Validation rule error  --}}
    @if(count($errors->get('slug')) > 0)
        <div class="alert callout">
            <ul>
                @foreach($errors->get('slug') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@if(isset($venue) && $venue->logo)
    <img src="{{ asset('/uploads/images/venue/'.$venue->logo ) }}" class="th img-thumbnail" alt="">
@else
    {!! Form::label('image',"Logo", ['class' => 'button']) !!}
    {!! Form::file('image',['class' => 'show-for-sr']) !!}
    {{-- Validation Errors --}}
    @if(count($errors->get('image')) > 0)
        <div class="alert callout">
            <ul>
                @foreach($errors->get('image') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endif


{!! Form::label('description',"Description", ['class' => 'control-label']) !!}
{!! Form::textarea('description',old('description'),['class' => 'form-control']) !!}
@if(count($errors->get('description')) > 0)
    <div class="alert callout">
        <ul>
            @foreach($errors->get('description') as $error)
                <li>{{ $error  }}</li>
            @endforeach
        </ul>
    </div>
@endif


{!! Form::submit('Submit', ['class' => 'button']) !!}
