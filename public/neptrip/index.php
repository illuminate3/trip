<?php include 'includes/header.php'; ?> 
            <div class="body-wrap">
                <!-- BANNER  -->
                <section class="banner-wrap">
                    <div class="banner row align-middle">
                        <div class="content">
                            <h3>Neptrip Business Listing</h3>
                            <div class="row">
                                <?php foreach(range(0, 2) as $key) :?>

                                    <div class="large-4 small-12 columns">
                                        <div class="content-item">
                                            <img src="images/online-icon.png" alt="">
                                            <h4>Online Services</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quis, dolor repellendus voluptatem accusamus eius animi. Alias nulla, consequuntur molestias doloremque hic sint, reiciendis possimus exercitationem?</p>   
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>                    
                </section>
                <!-- BANNER  -->

                <!-- search tabs -->
                <section class="search-box row">
                    <div class="wrap">
                        <ul class="tabs" data-tabs id="search-tabs">
                            <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Tab 1</a></li>
                            <li class="tabs-title"><a href="#panel2">Tab 2</a></li>
                        </ul>
                        <div class="tabs-content" data-tabs-content="search-tabs">
                            <div class="tabs-panel is-active" id="panel1">
                                <p>Vivamus hendrerit arcu sed erat molestie vehicula. Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor. Suspendisse dictum feugiat nisl ut dapibus.</p>
                            </div>
                            <div class="tabs-panel" id="panel2">
                                <p>Suspendisse dictum feugiat nisl ut dapibus.  Vivamus hendrerit arcu sed erat molestie vehicula. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.  Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor.</p>
                            </div>
                        </div>
                    </div>
                    
                </section>
                <!-- search tabs -->

                <!-- offers -->
                <section class="offer four-col-slider-wrap ">
                    <div class="section-wrap row">
                        <div class="section-head">
                            <h3>Explore our latest offer</h3>
                            <ul class="slider-nav">
                                <li class="prev"><i class="ti-angle-left"></i></li>
                                <li class="next"><i class="ti-angle-right"></i></li>
                            </ul>
                        </div>
                        <div class="section-content">                            
                            <ul class="four-col-slider">

                                <?php foreach (range(0, 6) as $key) : ?> 

                                    <li>
                                        <div class="wrap">
                                            <img src="images/car.png" alt="">
                                            <div class="desc">
                                                <h4>We offer Premium Hotels</h4>
                                                <hr>
                                                <a href="" class="button">More Info</a>
                                            </div>              
                                        </div>
                                    </li>

                                <?php endforeach; ?> 

                            </ul>
                        </div>

                        <a href="" class="view-more">View More >>></a>
                    </div>
                </section>
                <!-- offers -->

                <!-- accomodation -->
                <section class="accomodation three-col-slider-wrap ">
                    <div class="section-wrap row">
                        <div class="section-head">
                            <h3>Explore our latest accomodation</h3>
                            <ul class="slider-nav">
                                <li class="prev-3"><i class="ti-angle-left"></i></li>
                                <li class="next-3"><i class="ti-angle-right"></i></li>
                            </ul>
                        </div>
                        <div class="section-content">
                            <ul class="three-col-slider">

                                <?php foreach (range(0, 6) as $key) : ?> 

                                    <li>
                                        <div class="wrap">
                                            <img src="images/car.png" alt="">
                                            <div class="long-desc">
                                                <div class="row">
                                                    <h4 class="float-left">We offer Premium Hotels</h4>
                                                    <div class="star float-right"></div>
                                                </div>
                                                <div class="row">
                                                    <p>Kalanki, Kathmandu</p>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="float-left">
                                                        <p>Price from</p>
                                                    </div>
                                                    <div class="float-right">
                                                        <p>$199.50</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <p class="mb">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima corrupti praesentium quia, dolorem dolorum odio doloribus dicta laboriosam, corporis, fugit molestiae accusamus. Expedita, accusamus sit?</p>
                                                    <a href="#" class="more-info">More info</a>
                                                </div>
                                                <hr class="darker">
                                                <a href="" class="button">More Info</a>
                                            </div>              
                                        </div>
                                    </li>

                                <?php endforeach; ?>
                                
                            </ul>
                        </div>
                        <a href="" class="view-more">View More >>></a>
                    </div>                   
                </section>
                <!-- accomodation -->

                <!-- Tours -->
                <section class="tours four-col-slider-wrap ">
                    <div class="section-wrap row">
                        <div class="section-head">
                            <h3>Explore our latest tours</h3>
                            <ul class="slider-nav">
                                <li class="prev"><i class="ti-angle-left"></i></li>
                                <li class="next"><i class="ti-angle-right"></i></li>
                            </ul>
                        </div>
                        <div class="section-content">
                            <ul class="four-col-slider">

                               <?php foreach (range(0, 6) as $key) : ?> 

                                    <li>
                                        <div class="wrap">
                                            <img src="images/car.png" alt="">
                                            <div class="long-desc">
                                                <div class="row">
                                                    <h4 class="float-left">We offer Premium Hotels</h4>
                                                    <div class="star float-right"></div>
                                                </div>
                                                <div class="row">
                                                    <p>Kalanki, Kathmandu</p>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="float-left">
                                                        <p>Price from</p>
                                                    </div>
                                                    <div class="float-right">
                                                        <p>$199.50</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima corrupti praesentium quia, dolorem dolorum odio doloribus dicta laboriosam, corporis, fugit molestiae accusamus. Expedita, accusamus sit?</p>
                                                    <a href="#" class="more-info">More info</a>
                                                </div>
                                                <hr class="darker">
                                                <a href="" class="button">More Info</a>
                                            </div>              
                                        </div>
                                    </li>

                                <?php endforeach; ?>
                                
                            </ul>
                        </div>
                        <a href="" class="view-more">View More >>></a>
                    </div>
                </section>
                <!-- Tours -->

                <!-- vehicles -->
                <section class="vehicles three-col-slider-wrap ">
                    <div class="section-wrap row">
                        <div class="section-head">
                            <h3>Explore our latest offer</h3>
                            <ul class="slider-nav">
                                <li class="prev-3"><i class="ti-angle-left"></i></li>
                                <li class="next-3"><i class="ti-angle-right"></i></li>
                            </ul>
                        </div>
                        <div class="section-content">
                            <ul class="three-col-slider">
                                
                                <?php foreach (range(0, 6) as $key) : ?> 

                                    <li>
                                        <div class="wrap">
                                            <img src="images/car.png" alt="">
                                            <div class="long-desc">
                                                <div class="row">
                                                    <h4 class="float-left">We offer Premium Hotels</h4>
                                                    <div class="star float-right"></div>
                                                </div>
                                                <div class="row">
                                                    <p>Kalanki, Kathmandu</p>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="float-left">
                                                        <p>Price from</p>
                                                    </div>
                                                    <div class="float-right">
                                                        <p>$199.50</p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <p class="mb">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima corrupti praesentium quia, dolorem dolorum odio doloribus dicta laboriosam, corporis, fugit molestiae accusamus. Expedita, accusamus sit?</p>
                                                    <a href="#" class="more-info">More info</a>
                                                </div>
                                                <hr class="darker">
                                                <a href="" class="button">More Info</a>
                                            </div>              
                                        </div>
                                    </li>

                                <?php endforeach; ?>
                                
                            </ul>
                        </div>
                        <a href="" class="view-more">View More >>></a>
                    </div>
                </section>
                <!-- vehicles -->

            </div>
<?php include 'includes/footer.php' ?>            
