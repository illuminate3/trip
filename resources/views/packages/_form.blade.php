<div class="form-group">
    {!! Form::label('name','Name :',['class' => 'control-label']) !!}
    {!! Form::text('name',old('name'),['class' => 'form-control']) !!}
    @if(count($errors->get('name')) > 0)
        <div class="callout alert">
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
        <div class="callout alert">
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
        <div class="callout alert">
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
        <div class="callout alert">
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
        <div class="callout alert">
            <ul>
                @foreach($errors->get('description') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('duration','Duration',['class' => 'control-label']) !!}
    {!! Form::text('duration',old('duration'),['class' => 'form-control']) !!}
    @if(count($errors->get('duration')) > 0)
        <div class="callout alert">
            <ul>
                @foreach($errors->get('duration') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('difficulty','Difficulty',['class' => 'control-label']) !!}
    {!! Form::text('difficulty',old('difficulty'),['class' => 'form-control']) !!}
    @if(count($errors->get('difficulty')) > 0)
        <div class="callout alert">
            <ul>
                @foreach($errors->get('difficulty') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::label('best_season','Best Season',['class' => 'control-label']) !!}
    {!! Form::text('best_season',old('best_season'),['class' => 'form-control']) !!}
    @if(count($errors->get('best_season')) > 0)
        <div class="callout alert">
            <ul>
                @foreach($errors->get('best_season') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="form-group">
    {!! Form::hidden('tour_id',$tour->id) !!}
    {!! Form::submit('Submit',['class' => 'button']) !!}
</div>
