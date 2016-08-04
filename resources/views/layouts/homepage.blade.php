<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neptrip | @yield('title') </title>
    <link rel="stylesheet" href="{{ asset('neptrip/css/foundation.css') }}">
    <link rel="stylesheet" href="{{ asset('neptrip/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('neptrip/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('neptrip/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('neptrip/css/owl.theme.css') }}">
    <link rel="stylesheet" href="{{ asset('neptrip/css/owl.transitions.css') }}">
    <link rel="stylesheet" href="{{ asset('neptrip/css/lightbox.css') }}">
    <link rel="stylesheet" href="{{ asset('neptrip/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('neptrip/css/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('neptrip/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('neptrip/css/jquery.rateyo.min.css') }}">
    <link href="{{ asset('neptrip/stylesheets/screen.css') }}" media="screen, projection" rel="stylesheet" type="text/css" />
    <link href="{{ asset('neptrip/stylesheets/print.css') }}" media="print" rel="stylesheet" type="text/css" />
    <script src="{{ asset('neptrip/js/vendor/jquery.js') }}"></script>
    
</head>
<body>
<div class="page-wrap">

    <div class="page-loader">
        <div class="img-wrap">
            <img src="{{ asset('neptrip/images/logo.png') }}" alt="">
        </div>
    </div>

    <!-- modal for login -->
    <div class="reveal" id="login-modal" data-reveal data-close-on-click="true" data-animation-in="scale-in-down" data-animation-out="scale-out-down">
        <div class="regester-form">
            <div class="small-12 large-4 columns float-right">
                <h4>Log In With</h4>
                <ul>
                    <li><a href="{{ route('social.login', ['facebook']) }}"><img src="{{ asset('neptrip/images/fb-login.jpg') }}" alt=""></a></li>
                    <li><a href=""><img src="{{ asset('neptrip/images/tw-login.jpg') }}" alt=""></a></li>
                    <li><a href=""><img src="{{ asset('neptrip/images/gp-login.jpg') }}" alt=""></a></li>
                </ul>
            </div>
            <div class="small-12 large-8 columns login-form">
                <h4>log in</h4>
                <!-- login-form -->
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                            {{ csrf_field() }}

                                <input id="email" type="email"  name="email" value="{{ old('email') }}" placeholder="yourname@gmail.com">

                                    @if ($errors->has('email'))
                                        <span class="caption alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                           
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Enter your password">

                                    @if ($errors->has('password'))
                                        <span class="caption alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                    <div class="small-6 columns remember">
                                        <input id="remember" type="checkbox"><label for="remember">Remember me</label>
                                    </div>
                        
                                    <button type="submit" class="button expanded">
                                        Login
                                    </button>
                                    <div class="small-6 columns forgot">
                                        <a href="{{ url('/password/reset') }}">Forgot Your Password?</a>
                                    </div>
                             
                            
                    </form>
                  
                
                <div class="seperator">
                    <div class="wrap">
                        <div class="or">OR</div>
                    </div>
                </div>
            </div>
        </div>
        <button class="close-button" data-close aria-label="Close reveal" type="button">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <!-- modal for login -->

    <!-- for header -->
    <div class="search-bar">
        <div class="wrap">
            <input type="text" placeholder="Search here">
            <div class="close-btn"><i class="ti-close"></i></div>
        </div>
    </div>
    <header class="page-header">
        <div class="row">
            <div class="small-6 large-3 columns">
                <div class="logo">
                    <a href="/"><img src="{{ asset('neptrip/images/logo.png') }}" alt=""></a>
                </div>
            </div>
            <div class="small-6 large-9 columns">
                <ul class="top-header">
                @if(Auth::check())
                    @if(Shinobi::is('admin'))
                        <li><a href="{{ url('/dash')}}">Dashboard</a></li>
                    @elseif(Shinobi::is('business'))
                        <li><a href="{{ url('/profile') }}">Profile</a></li>
                    @endif
                @else
                    <li><a data-toggle="login-modal">join</a></li>
                    <li><a data-toggle="login-modal">log in</a></li>
                @endif
                </ul>
                <div class="nav-toggle">
                    <i class="fa fa-bars"></i>
                </div>
                <ul class="main-nav">
                    <li><a href="/">Home</a></li>
                    <li><a href="/about/">About us</a></li>
                    <li><a href="/hotels/">Hotel</a></li>
                    <li><a href="/venues/">Venue</a></li>
                    <li><a href="/restaurants/">Restaurant</a></li>
                    <li><a href="/tours/">Tour</a></li>
                    <li><a href="/vehicles/">Vehicle</a></li>
                    <li><a href="/contact/">Contact Us</a></li>
                    <li><a href="/blog/">Blogs</a></li>
                    <li><a class="search-btn"><i class="ti-search"></i></a></li>
                    <div class="responsive-lists">
                        <li><a data-toggle="login-modal">join</a></li>
                        <li><a data-toggle="login-modal">log in</a></li>
                    </div>
                </ul>
            </div>
        </div>
    </header>
    <!-- header -->
    @include('layouts._flash')
    @yield('content')
    <footer class="page-footer">
    <div class="row">
        <div class="small-12 large-3 columns">
            <div class="wrap info">
                <img src="{{ asset('neptrip/images/logo.png') }}" alt="">
                <p>Ratopul, Kathmandu, Nepal</p>
                <p><span>P:</span> Customer support: 01-4433975</p>
                <p><span>E:</span> <a href="mailto:info@neprtip.com">info@neptrip.com</a></p>
            </div>
        </div>
        <div class="small-12 large-2 columns">
            <div class="wrap">
                <h5>Customer Support</h5>
                <ul class="customer-support">
                    <li><a href="/faq/">Faq</a></li>
                    <li><a href="/payment-options/" class="">Payment Options</a></li>
                    <li><a href="/booking-tips/" class="">booking tips</a></li>
                </ul>
            </div>
        </div>
        <div class="small-12 large-3 columns">
            <div class="wrap">
                <h5>Follow Us</h5>
                <ul class="social">
                    <li><a href=""><i class="fa fa-facebook-square"></i></a></li>
                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                    <li><a href=""><i class="fa fa-tumblr"></i></a></li>
                    <li><a href=""><i class="fa fa-pinterest"></i></a></li>
                    <li><a href=""><i class="fa fa-rss"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="small-12 large-4 columns">
            <div class="wrap">
                <h5>Newsletter</h5>
                <p>We promise to only send you good things</p>
                {!! Form::open(['action'=>'MailController@sendNewsletterMail','method'=>'post','class'=>'subscribe-form']) !!}
                    {!! Form::email('email',old('email'),['placeholder'=>'Enter your email address']) !!}
                    {!! Form::submit('<i class="fa fa-angle-right"></i>') !!}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    <div class="row bottom-footer">
        <p class="float-left">©neptrip.com. All rights reserved</p>
        <ul class="float-right">
            <li><a href="/">Home</a></li>
            <li><a href="/about/">About us</a></li>
            <li><a href="/hotels/">Hotel</a></li>
            <li><a href="/venues/">Venue</a></li>
            <li><a href="/restaurants/">Restaurant</a></li>
            <li><a href="/tours/">Tour</a></li>
            <li><a href="/vehicles/">Vehicle</a></li>
            <li><a href="/contact/">Contact Us</a></li>
            <li><a href="/blog/">Blogs</a></li>
            <li><a class="search-btn"><i class="ti-search"></i></a></li>
        </ul>
    </div>
</footer>

</div>



<script src="{{ asset('neptrip/js/vendor/what-input.js') }}"></script>
<script src="{{ asset('neptrip/js/vendor/foundation.js') }}"></script>
<script src="{{ asset('neptrip/js/slick.js') }}"></script>
<script src="{{ asset('neptrip/js/owl.carousel.js') }}"></script>
<script src="{{ asset('neptrip/js/wow.min.js') }}"></script>
<script src="{{ asset('neptrip/js/lightbox.js') }}"></script>
<script src="{{ asset('neptrip/js/pace.js') }}"></script>
<script src="{{ asset('neptrip/js/jquery.rateyo.min.js') }}"></script>
<script src="{{ asset('neptrip/js/app.js') }}"></script>
@yield('scripts')
@yield('script')
</body>
</html>
