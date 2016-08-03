@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        <h1 class="col-md-12">Search</h1>

            {!! Form::open(['action' => 'SearchController@searchByName','class' =>'col-md-12 form-horizontal','method' => 'POST']) !!}
            <div class="form-group">
                {!! Form::label('type','Search For',['class' => 'control-label' ]) !!}
                <?php $type = [

                        'restaurant' => 'Restaurants',
                        'venue' => 'Venues',
                        'vehicle' => 'Vehicles',
                        'tour' => 'Tours',
                        'hotel' => 'Hotels'
                ];
                ?>

                {!! Form::select('type',$type, null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name',null,['class' => 'form-control' ]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit() !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop