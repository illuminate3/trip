@extends('layouts.profile')


@section('profile-content')
    <div class="body-wrap profile business-profile">
        <div class="row collapse">
            <div class="medium-10 columns">
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
                            <div class="input-wizard">
                                <div class="slide first">
                                    <h4>Select Your Business type</h4>
                                    <hr>
                                    <div class="row categories">
                                        <div class="cat">
                                            <a href="{{ url('hotels/create') }}"><p><i class="fa fa-hotel"></i></p><p>Hotel</p></a>
                                        </div>
                                        <div class="cat">
                                            <a href="{{ url('venues/create') }}"><p><i class="fa fa-map-o"></i></p><p>Venue</p></a>
                                        </div>
                                        <div class="cat">
                                            <a href="{{ url('restaurants/create') }}"><p><i class="fa fa-cutlery"></i></p><p>restrurant</p></a>
                                        </div>
                                        <div class="cat">
                                            <a href="{{ url('tours/create') }}"><p><i class="fa fa-plane"></i></p><p>Tour</p></a>
                                        </div>
                                        <div class="cat">
                                            <a href="{{ url('vehicles/create') }}"><p><i class="fa fa-car"></i></p><p>vehicle</p></a>
                                        </div>
                                    </div>                                    
                                </div>
                                <div class="slide form-load" >
                                    
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="tabs-panel" id="panel4v">
                        <ul class="collection-wrap">

                            <div class="input-wizard">
                                
                            </div>

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
@stop