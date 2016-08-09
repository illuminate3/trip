@extends('layouts.dash')

@section('page-title')
    Dashboard
@stop

@section('page-description')
    You can manage all your things here
@stop

@section('content')
    <div class="panel">
        <div class="panel-body">
            <h3 class="title-hero">
                Shortcuts
            </h3>
            <div class="example-box-wrapper">
                <div class="row">
                    <div class="col-md-2">
                        <a href="{{ url('dash/hotels') }}" title="Example tile shortcut" class="tile-box tile-box-shortcut btn-primary">
                            <span class="bs-badge badge-absolute">5</span>
                            <div class="tile-header">
                                Hotels
                            </div>
                            <div class="tile-content-wrapper">
                                <i class="glyph-icon icon-dashboard"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ url('dash/restaurants') }}" title="Example tile shortcut" class="tile-box tile-box-shortcut btn-black">
                            <span class="bs-badge badge-absolute">5</span>
                            <div class="tile-header">
                                Restaurants
                            </div>
                            <div class="tile-content-wrapper">
                                <i class="glyph-icon icon-cogs"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ url('dash/venues') }}" title="Example tile shortcut" class="tile-box tile-box-shortcut btn-danger">
                            <span class="bs-badge badge-absolute">1</span>
                            <div class="tile-header">
                                Venues
                            </div>
                            <div class="tile-content-wrapper">
                                <i class="glyph-icon icon-file-photo-o"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ url('dash/vehicles') }}" title="Example tile shortcut" class="tile-box tile-box-shortcut btn-success">
                            <div class="tile-header">
                                Vehicles
                            </div>
                            <div class="tile-content-wrapper">
                                <i class="glyph-icon icon-desktop"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="#" title="Example tile shortcut" class="tile-box tile-box-shortcut btn-info">
                            <span class="bs-badge badge-absolute">2</span>
                            <div class="tile-header">
                                Business
                            </div>
                            <div class="tile-content-wrapper">
                                <i class="glyph-icon icon-download"></i>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ url('dash/carousel') }}" title="Manage your carousels/slider" class="tile-box tile-box-shortcut btn-warning">
                            <div class="tile-header">
                                Carousel
                            </div>
                            <div class="tile-content-wrapper">
                                <i class="glyph-icon icon-code-fork"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
