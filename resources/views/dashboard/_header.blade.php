<div id="header-nav-left">
    <a class="header-btn" id="loogout-btn" href="{{ url('/logout') }}" title="Log Out">
        <i class="glyph-icon icon-linecons-lock"></i>
    </a>
    <div class="user-account-btn dropdown">
        <a href="#" title="My Account" class="user-profile clearfix" data-toggle="dropdown">
            <img width="28" src="{{ asset("assets/image-resources/gravatar.jpg") }}" alt="Profile image">
            @if(Auth::check())
                <span>{{ Auth::user()->name }}</span>
            @else
                <span>Anonymous</span>
            @endif
            <i class="glyph-icon icon-angle-down"></i>
        </a>
        <div class="dropdown-menu float-right">
            <div class="box-sm">
                <div class="login-box clearfix">
                    <div class="user-img">
                        <a href="#" title="" class="change-img">Change photo</a>
                        <img src="{{ asset("assets/image-resources/gravatar.jpg") }}" alt="">
                    </div>
                    <div class="user-info">
                            <span>

                               <i>{{-- Auth::user()->username --}}</i>
                            </span>
                        <a href="#" title="Change your app config here">Settings</a>
                        <a href="#" title="View notifications">View notifications</a>
                    </div>
                </div>
                <div class="divider"></div>
                <ul class="reset-ul mrg5B">
                    <li>
                        <a href="{{ url('dash/settings')}}">
                            <i class="glyph-icon float-right icon-caret-right"></i>
                            Settings
                        </a>
                    </li>

                </ul>
                <div class="button-pane button-pane-alt pad5L pad5R text-center">
                    <a href="{{url('/logout') }}" class="btn btn-flat display-block font-normal btn-danger">
                        <i class="glyph-icon icon-power-off"></i>
                        Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</div><!-- #header-nav-left -->

<div id="header-nav-right">
    <a href="#" class="hdr-btn popover-button" title="Search" data-placement="bottom" data-id="#popover-search">
        <i class="glyph-icon icon-search"></i>
    </a>
    <div class="hide" id="popover-search">
        <div class="pad5A box-md">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search terms here ...">
                    <span class="input-group-btn">
                        <a class="btn btn-primary" href="#">Search</a>
                    </span>
            </div>
        </div>
    </div>
    <div class="dropdown" id="dashnav-btn">
        <a href="#" data-toggle="dropdown" data-placement="bottom" class="popover-button-header tooltip-button" title="Dashboard Quick Menu">
            <i class="glyph-icon icon-linecons-cog"></i>
        </a>
        <div class="dropdown-menu float-left">
            <div class="box-sm">
                <div class="pad5T pad5B pad10L pad10R dashboard-buttons clearfix">
                    <a href="{{ url('dash/watchtower/user') }}" class="btn vertical-button hover-blue-alt" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-users opacity-80 font-size-20"></i>
                            </span>
                        Users
                    </a>
                    <a href="{{ url('dash/watchtower/permission') }}" class="btn vertical-button hover-green" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-tags opacity-80 font-size-20"></i>
                            </span>
                        Permission
                    </a>
                    <a href="{{ url('dash/watchtower/role') }}" class="btn vertical-button hover-orange" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-fire opacity-80 font-size-20"></i>
                            </span>
                        Roles
                    </a>
                    <a href="#" class="btn vertical-button hover-orange" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-bar-chart-o opacity-80 font-size-20"></i>
                            </span>
                        Charts
                    </a>
                    <a href="#" class="btn vertical-button hover-purple" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-laptop opacity-80 font-size-20"></i>
                            </span>
                        Buttons
                    </a>
                    <a href="#" class="btn vertical-button hover-azure" title="">
                            <span class="glyph-icon icon-separator-vertical pad0A medium">
                                <i class="glyph-icon icon-code opacity-80 font-size-20"></i>
                            </span>
                        Panels
                    </a>
                </div>
                <div class="divider"></div>

            </div>
        </div>
    </div>
    <a href="#" class="hdr-btn" id="fullscreen-btn" title="Fullscreen">
        <i class="glyph-icon icon-arrows-alt"></i>
    </a>
    
    <div class="dropdown" id="notifications-btn">
        <a data-toggle="dropdown" href="#" title="">
            <span class="small-badge bg-yellow"></span>
            <i class="glyph-icon icon-linecons-megaphone"></i>
        </a>
        <div class="dropdown-menu box-md float-left">

            <div class="popover-title display-block clearfix pad10A">
                Notifications
                <a class="text-transform-cap font-primary font-normal btn-link float-right" href="#" title="View more options">
                    More options...
                </a>
            </div>
            <div class="scrollable-content scrollable-slim-box">
                <ul class="no-border notifications-box">
                    <li>
                        <span class="bg-danger icon-notification glyph-icon icon-bullhorn"></span>
                        <span class="notification-text">This is an error notification</span>
                        <div class="notification-time">
                            a few seconds ago
                            <span class="glyph-icon icon-clock-o"></span>
                        </div>
                    </li>
                    
                </ul>
            </div>
            <div class="button-pane button-pane-alt pad5T pad5L pad5R text-center">
                <a href="#" class="btn btn-flat btn-primary" title="View all notifications">
                    View all notifications
                </a>
            </div>
        </div>
    </div>
    <div class="dropdown" id="progress-btn">
        <a data-toggle="dropdown" href="#" title="">
            <span class="small-badge bg-azure"></span>
            <i class="glyph-icon icon-linecons-params"></i>
        </a>
        <!-- <div class="dropdown-menu pad0A box-sm float-left" id="progress-dropdown"> -->
            <div class="scrollable-content scrollable-slim-box">
            
            </div>
            
        <!-- </div> -->
    </div>
    <div class="dropdown" id="cloud-btn">
        <a href="#" data-placement="bottom" class="tooltip-button sb-toggle-right" title="Statistics Sidebar">
            <i class="glyph-icon icon-linecons-cloud"></i>
        </a>
    </div>

</div><!-- #header-nav-right -->
