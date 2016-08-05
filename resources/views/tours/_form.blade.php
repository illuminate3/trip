{!! Form::label('name',"Name", ['class' => 'control-label']) !!}
{!! Form::text('name', old('name'),['class' => 'form-control']) !!}
@if(count($errors->get('name')) > 0)
    <div class="alert caption">
        <ul>
            @foreach($errors->get('name') as $error)
                <li>{{ $error  }}</li>
            @endforeach
        </ul>
    </div>
@endif

{!! Form::label('slug',"Slug", ['class' => 'control-label']) !!}
{!! Form::text('slug',old('slug'),['class' => 'form-control']) !!}
@if(count($errors->get('slug')) > 0)
    <div class="alert caption">
        <ul>
            @foreach($errors->get('slug') as $error)
                <li>{{ $error  }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(isset($tour) && $tour->logo)
    <img src="{{ asset('/uploads/images/tour/'.$tour->logo ) }}" class="th img-thumbnail" alt="">
@else
    {!! Form::label('image',"Upload", ['class' => 'control-label button']) !!}
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
@endif

{!! Form::label('description',"Description", ['class' => 'control-label']) !!}
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
{!! Form::submit('Submit', ['class' => 'form-control button btn btn-primary']) !!}
