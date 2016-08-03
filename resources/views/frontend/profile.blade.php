@extends('layouts.homepage')

@section('title')
    profile
@stop

@section('content')
    <div class="body-wrap profile business-profile">
        <div class="row collapse">
            <div class="medium-2 columns">
                <ul class="tabs vertical" id="business-profile" data-tabs>
                    <li class="tabs-title is-active"><a href="#panel1v" aria-selected="true">Profile</a></li>
                    <li class="tabs-title"><a href="#panel3v">Add a business</a></li>
                    <li class="tabs-title"><a href="#panel4v">All Business</a></li>
                    <li class="tabs-title"><a href="#panel2v">Booking History <span class="badge float-right">1</span></a></li>
                    <li class="tabs-title"><a href="#panel5v">Profile Settings</a></li>
                    <li class="tabs-title"><a href="#panel6v">Logout</a></li>
                </ul>
            </div>
            <div class="medium-10 columns">
                <div class="tabs-content vertical" data-tabs-content="business-profile">
                    <div class="tabs-panel is-active" id="panel1v">
                        <h4>Welcome User!</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda iste officia iure quisquam optio eaque sequi quis, corporis, nihil mollitia molestias consectetur perferendis delectus doloribus?</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda iste officia iure quisquam optio eaque sequi quis, corporis, nihil mollitia molestias consectetur perferendis delectus doloribus?</p>
                    </div>
                    <div class="tabs-panel" id="panel2v">
                        <table>
                            <thead>
                                <tr>
                                    <th width="100">S.No</th>
                                    <th>Business Name</th>
                                    <th width="250">Booking Info</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Content Goes Here</td>
                                    <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
                                    <td>Content Goes Here</td>
                                </tr>
                                <tr>
                                    <td>Content Goes Here</td>
                                    <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
                                    <td>Content Goes Here</td>
                                </tr>
                                <tr>
                                    <td>Content Goes Here</td>
                                    <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
                                    <td>Content Goes Here</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="tabs-panel" id="panel3v">
                        <div class="slider-wrap">
                            <div class="input-slider">
                                <div class="slide first">
                                    <h4>Select Your Business type</h4>
                                    <hr>
                                    <div class="row categories">
                                        <div class="cat">
                                            <a id="cat-hotel"><p><i class="fa fa-hotel"></i></p><p>Hotel</p></a>
                                        </div>
                                        <div class="cat">
                                            <a id="cat-venue"><p><i class="fa fa-map-o"></i></p><p>Venue</p></a>
                                        </div>
                                        <div class="cat">
                                            <a id="cat-restrurant"><p><i class="fa fa-cutlery"></i></p><p>restrurant</p></a>
                                        </div>
                                        <div class="cat">
                                            <a id="cat-tour"><p><i class="fa fa-plane"></i></p><p>Tour</p></a>
                                        </div>
                                        <div class="cat">
                                            <a id="cat-vehicle"><p><i class="fa fa-car"></i></p><p>vehicle</p></a>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="slide cat-hotel" >
                                    <h4>Enter Hotel Details</h4>
                                    <hr>
                                    <div class="form-wrap">
                                        <form action="">
                                            @include('hotels._frontendform')
                                        </form>
                                    </div>
                                </div>          
                                <div class="slide cat-venue" >
                                    <h4>Enter Venue Details</h4>
                                    <hr>
                                    <div class="form-wrap">
                                        <form action="">
                                            @include('venues._form')
                                        </form>
                                    </div>
                                </div>          
                                <div class="slide cat-restrurant" >
                                    <h4>Enter restrurant Details</h4>
                                    <hr>
                                    <div class="form-wrap">
                                        <form action="">
                                            @include('restaurants._form')
                                        </form>
                                    </div>
                                </div>          
                                <div class="slide cat-tour" >
                                    <h4>Enter tour Details</h4>
                                    <hr>
                                    <div class="form-wrap">
                                        <form action="">
                                            @include('tours._form')
                                        </form>
                                    </div>
                                </div>          
                                <div class="slide cat-vehicle" >
                                    <h4>Enter vehicles Details</h4>
                                    <hr>
                                    <div class="form-wrap">
                                        <form action="">
                                            @include('vehicles._form')
                                        </form>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                    <div class="tabs-panel" id="panel4v">
                        <ul class="collection-wrap">

                            @foreach ($hotels as $hotel)

                                <li>
                                    <div class="wrap">
                                        <div class="img-wrap">
                                            <img src="{{ asset('uploads/images/hotel/'.$hotel->logo) }}" alt="">
                                        </div>
                                        <div class="long-desc">
                                            <div class="row">
                                                <h4 class="float-left">{{ $hotel->title }}</h4>
                                                <div class="star float-right"></div>
                                            </div>
                                            <div class="row">
                                                <p class="address">{{ $hotel->contacts['address'] }}</p>
                                            </div>
                                            <a href="{{ url('hotels/'.$hotel->slug)}}" class="button">Edit</a>
                                        </div>
                                    </div>
                                </li>

                            @endforeach
                        </ul>
                    </div>
                    <div class="tabs-panel" id="panel5v">
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="tabs-panel" id="panel6v">
                        <img class="thumbnail" src="assets/img/generic/rectangle-5.jpg">
                    </div>
                </div>
          </div>
        </div> 

    </div>
@stop