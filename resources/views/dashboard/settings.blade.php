@extends('layouts.dash')
@section('page-title')
    Settings
@stop

@section('page-description')
    Edit your Site Configuration Here
@stop

@section('content')
<div class="panel">
    <div class="panel-body">
        <h3 class="title-hero">
            Your site configurations
        </h3>
        
        <div class="example-box-wrapper">
            {!! Form::open(['class'=>'form-horizontal bordered-row']) !!}
            <div class="form-group">
                <div class="col-sm-3 control-label">
                    {!! Form::label('facebook','Facebook Link',['class'=>'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::text('facebook',old('facebook') ,['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 control-label">
                    {!! Form::label('twitter','Twitter Link',['class'=>'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::text('twitter',old('twitter'),['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 control-label">
                    {!! Form::label('Pintrest','Pintrest Link',['class'=>'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::text('Pintrest',old('Pintrest'),['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 control-label">
                    {!! Form::label('google','Google Link',['class'=>'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::text('google',old('google'),['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 control-label">
                    {!! Form::label('address','Address',['class'=>'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::text('address',old('address'),['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 control-label">
                    {!! Form::label('phone','Phone',['class'=>'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::text('phone',old('phone'),['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 control-label">
                    {!! Form::label('latitude','Latitude',['class'=>'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::text('latitude',old('latitude'),['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 control-label">
                    {!! Form::label('longitude','Longitude',['class'=>'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::text('longitude',old('longitude'),['class'=>'form-control']) !!}
                </div>
            </div>
             <div class="form-group">
                <div class="col-sm-3 control-label">
                    {!! Form::label('email','Email',['class'=>'form-control']) !!}
                </div>
                <div class="col-sm-6">
                    {!! Form::text('email',old('email'),['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::submit('Submit',['class'=>'form-control']) !!}
            </div>
      {!! Form::close() !!}
            </div>
        </div>
    </div>

@stop

@section('script')

@stop
