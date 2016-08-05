<div class="form-group">
    {!! Form::label('title','Title', ['class' => 'control-label'] ) !!}
    {!! Form::text('title', old('title') , ['class' => 'form-control']) !!}
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
@if(isset($gallery) && $gallery->galleries[0]->image)
    <img src="{{ asset('uploads/images/gallery/th_'.$gallery->galleries[0]->image) }}" alt="">
@else
<div class="form-group">
    {!! Form::label('image','Image', ['class' => 'button']) !!}
    {!! Form::file('image',['class' => 'show-for-sr'])  !!}
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
@endif
<div class="form-group">
    {!! Form::label('description', 'Description', ['class' => 'control-label'])  !!}
    {!! Form::textarea('description', null,['class' => 'form-control']) !!}
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
    {!! Form::hidden('model',$model) !!}
    {!! Form::submit('Submit', ['class' => 'button'])  !!}
</div>
