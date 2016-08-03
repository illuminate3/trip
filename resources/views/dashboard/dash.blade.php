@extends('layouts.dash')

@section('page-title')
    Dashboard
@stop

@section('page-description')
    You can manage all your things here
@stop

@section('content')
    <div class="col-md-4">
        <div class="dashboard-box bg-blue">
            <div class="content-wrapper">
                <div class="header">
                    Restaurant List
                    <span>November 2016 - December 2016</span>
                </div>
                <div class="center-div sparkline-bar-big">579,180,311,405,342,579,405,311,311,450,302,370,510,405,342,579,405,311,235,311,450,302,370,510</div>
            </div>
            <div class="button-pane">
                <div class="size-md float-left heading">
                     Show all restaurant
                </div>
                <a href="#" class="btn btn-success float-right tooltip-button" data-placement="top" title="Remove comment">
                    <i class="glyph-icon icon-reply"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="dashboard-box bg-green">
            <div class="content-wrapper">
                <div class="header">
                    Hotels List
                    <span>November 2016 - December 2016</span>
                </div>
                <div class="center-div sparkline-bar-big">200,180,311,405,342,579,405,311,311,450,302,370,510,405,342,579,405,311,235,311,450,302,370,510</div>
            </div>
            <div class="button-pane">
                <div class="size-md float-left heading">
                     Show all hotels
                </div>
                <a href="#" class="btn btn-success float-right tooltip-button" data-placement="top" title="Remove comment">
                    <i class="glyph-icon icon-reply"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="dashboard-box bg-green">
            <div class="content-wrapper">
                <div class="header">
                    Tours List
                    <span>November 2016 - December 2016</span>
                </div>
                <div class="center-div sparkline-bar-big">200,180,311,405,342,579,405,311,311,450,302,370,510,405,342,579,405,311,235,311,450,302,370,510</div>
            </div>
            <div class="button-pane">
                <div class="size-md float-left heading">
                     Show all Tours
                </div>
                <a href="#" class="btn btn-success float-right tooltip-button" data-placement="top" title="Remove comment">
                    <i class="glyph-icon icon-reply"></i>
                </a>
            </div>
        </div>
    </div>
@stop
