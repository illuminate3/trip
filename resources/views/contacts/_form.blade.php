<div class="row">
    <div class="form-group columns medium-6">
        {{-- {!! Form::label('phone1','Phone No 1:',['class' => 'control-label']) !!} --}}
        {!! Form::text('phone1',old('phone1'),['class' => 'form-control','placeholder'=>'Enter your phone number']) !!}
        @if(count($errors->get('phone1')) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('phone1') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="form-group columns medium-6">
        {{--{!! Form::label('phone2','Phone No 2:',['class' => 'control-label']) !!}--}}
        {!! Form::text('phone2',old('phone2'),['class' => 'form-control','placeholder'=>'Enter alternate phone number']) !!}
        @if(count($errors->get('phone2')) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('phone2') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group columns medium-6">
        {!! Form::label('mobile','Mobile:',['class' => 'control-label']) !!}
        {!! Form::text('mobile',old('mobile'),['class' => 'form-control','placeholder' => 'Enter Your Mobile Number']) !!}
        @if(count($errors->get('mobile')) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('mobile') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="form-group columns medium-6">
        {!! Form::label('fax','Fax :',['class' => 'control-label']) !!}
        {!! Form::text('fax',old('fax'),['class' => 'form-control','placeholder'=>'Enter your fax number']) !!}
        @if(count($errors->get('fax')) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('fax') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div> {{--row--}}
<div class="row">
    <div class="form-group columns medium-6">
        {!! Form::label('representative','Representative',['class' => 'control-label']) !!}
        {!! Form::text('representative',old('representative'),['class' => 'form-control','placeholder'=>'Enter the name of representative for your business']) !!}
        @if(count($errors->get('representative')) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('representative') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="form-group columns medium-6">
        {!! Form::label('role','role',['class' => 'control-label']) !!}
        {!! Form::text('role',old('role'),['class' => 'form-control','placeholder'=>'Role of representative']) !!}
        @if(count($errors->get('role')) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('role') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('email','Email:',['class' => 'control-label']) !!}
    {!! Form::email('email',old('email'),['class' => 'form-control','placeholder'=>'Enter your contact Email']) !!}
    @if(count($errors->get('email')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('email') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="row">
    <div class="form-group medium-6 columns">
        {!! Form::label('facebook','Facebook :',['class' => 'control-label']) !!}
        {!! Form::text('facebook',old('facebook'),['class' => 'form-control','placeholder'=>'Enter your facebook link']) !!}
        @if(count($errors->get('facebook')) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('facebook') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="form-group medium-6 columns">
        {!! Form::label('website','Website :',['class' => 'control-label']) !!}
        {!! Form::text('website',old('website'),['class' => 'form-control','placeholder'=>'Link of your website']) !!}
        @if(count($errors->get('website')) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('website') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
<div class="row">
    <div class="form-group columns medium-6">
        {!! Form::label('zone','Zone :',['class' => 'control-label']) !!}
        {!! Form::text('zone',old('zone'),['class' => 'form-control','placeholder'=>'Click on the map to get the zone']) !!}
        @if(count($errors->get('zone')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('zone') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="form-group columns medium-6">
        {!! Form::label('district','District',['class' => 'control-label']) !!}
        {!! Form::text('district',old('district'),['class' => 'control-label','placeholder'=>'Click on the map to get the district']) !!}
        @if(count($errors->get('district')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('district') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('address','Address :',['class' => 'control-label']) !!}
    {!! Form::text('address',old('address'),['class' => 'form-control','placeholder'=>'Click on the map to get the address']) !!}
    <div id="map" style="height:300px !important"></div>
    @if(count($errors->get('address')) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->get('address') as $error)
                    <li>{{ $error  }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<div class="row">
    <div class="form-group columns medium-6">
        {!! Form::label('latitude','Latitude :',['class' => 'control-label']) !!}
        {!! Form::text('latitude',old('latitude'),['class' => 'form-control','placeholder'=>'Click on the map to get the latitude']) !!}
        @if(count($errors->get('latitude')) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('latitude') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="form-group columns medium-6">
        {!! Form::label('longitude','Longitude :',['class' => 'control-label']) !!}
        {!! Form::text('longitude',old('longitude'),['class' => 'form-control','placeholder'=>'Click on the map to get the longitude']) !!}
        @if(count($errors->get('longitude')) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->get('longitude') as $error)
                        <li>{{ $error  }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::submit('Submit',['class' => 'button']) !!}
</div>

@section('scripts')
    {{-- Script for google maps --}}
    @include('contacts._contactsJS')
    
@stop