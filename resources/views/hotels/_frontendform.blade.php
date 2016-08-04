<h4><div class="float-left back-cat"><i class="ti-angle-left"></i></div>Enter Hotel Details</h4>
<hr>
<div class="form-wrap">
    {!! Form::open(['action' => 'HotelsController@store','files' => true]) !!}
        <div class="form-group">
            
            {!! Form::label('name',"Name", ['class' => 'control-label']) !!}
            {!! Form::text('name', old('name') ,['class' => 'form-control']) !!}
            @if(count($errors->get('name')) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->get('name') as $error)
                            <li>{{ $error  }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="form-group float-right">


            {!! Form::label('description',"Description", ['class' => 'control-label ']) !!}
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
            {!! Form::label('slug',"Slug", ['class' => 'control-label']) !!}
            {!! Form::text('slug',old('slug') ,['class' => 'form-control']) !!}
            @if(count($errors->get('slug')) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->get('slug') as $error)
                            <li>{{ $error  }}</li>
                        @endforeach
                    </ul>
                </div>
           @endif
        </div>
        
        <div class="form-group btn">


            {!! Form::label('image',"Upload Picture", ['class' => ' button']) !!}
            {!! Form::file('image',['class' => 'show-for-sr']) !!}
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
        <div class="form-group btn">

            {!! Form::submit('Next', ['class' => 'button form-next']) !!}
        </div>


    {!! Form::close() !!}
</div>