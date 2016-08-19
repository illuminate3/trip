@if(count($errors) > 0)
    {{ dd($errors) }}
@endif
<div class="form-group">
    {!! Form::label('type','Vehicle Type:',['class' => 'control-label']) !!}
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
    {!! Form::label('manufacturer','manufacturer',['class' => 'control-label']) !!}
    {!! Form::text('manufacturer',old('manufacturer'),['class' => 'form-control']) !!}
    @if(count($errors->get('manufacturer')) > 0)
            <div class="alert caption">
                <ul>
                    @foreach($errors->get('manufacturer') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>
<div class="form-group">
    {!! Form::label('max_people','max_people',['class' => 'control-label']) !!}
    {!! Form::text('max_people',old('max_people'),['class' => 'form-control']) !!}
    @if(count($errors->get('max_people')) > 0)
            <div class="alert caption">
                <ul>
                    @foreach($errors->get('max_people') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>
<div class="form-group">
    {!! Form::label('mileage','mileage',['class' => 'control-label']) !!}
    {!! Form::text('mileage',old('mileage'),['class' => 'form-control']) !!}
    @if(count($errors->get('mileage')) > 0)
            <div class="alert caption">
                <ul>
                    @foreach($errors->get('mileage') as $error)
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
<div class="form-group columns medium-6">
    {!! Form::label('air_conditioned','Air Conditioned',['class' => 'control-label']) !!}
    {!! Form::select('air_conditioned',['1'=>'Yes','0'=>'No'],old('air_conditioned'),['class' => 'form-control']) !!}
    @if(count($errors->get('air_conditioned')) > 0)
            <div class="alert caption">
                <ul>
                    @foreach($errors->get('air_conditioned') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>
<div class="form-group columns medium-6">
    {!! Form::label('doors','Doors',['class' => 'control-label']) !!}
    {!! Form::text('doors',old('doors'),['class' => 'form-control']) !!}
    @if(count($errors->get('air_conditioned')) > 0)
            <div class="alert caption">
                <ul>
                    @foreach($errors->get('air_conditioned') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
</div>
<div class="form-group">
    {!! Form::submit('Submit',['class' => 'button']) !!}
</div>
