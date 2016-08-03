<div id="header-logo" class="logo-bg">
    <a href="#" class="logo-content-big" title="Neptrip Dashboard">
        Neptrip <i>Dashboard</i>
        <span>Welcome to Dashboard</span>
    </a>
    <a href="index.html" class="logo-content-small" title="Neptrip Dashboard">
        Neptrip <i>Dashboard</i>
        <span>Welcome to Dashboard</span>
    </a>
    <a id="close-sidebar" href="#" title="Close sidebar">
        <i class="glyph-icon icon-outdent"></i>
    </a>
</div>
<div class="scroll-sidebar">
    <ul id="sidebar-menu">
        <li class="header"><span>Dashboard</span></li>
        <li>
            <a href="{{ url('/dash') }}" title="Admin Dashboard">
                <i class="glyph-icon icon-linecons-tv"></i>
                <span>Admin dashboard</span>
            </a>
        </li>
        <li class="header"><span>Business</span></li>
        <li>
            <a href="javascript:void(0);" title="Restaurants">
                <i class="glyph-icon icon-linecons-diamond"></i>
                <span>Restaurants</span>
            </a>
            <div class="sidebar-submenu">

                <ul>
                  <li><a href="{{ url('dash/restaurants')}}" title="Buttons"><span>All Restaurant</span></a></li>
                  <li><a href="{{ url('dash/restaurant/create')}}" title="Buttons"><span>Create</span></a></li>
                </ul>

            </div><!-- .sidebar-submenu -->
        </li><li>
            <a href="javascript:void(0);" title="Hotels">
                <i class="glyph-icon icon-linecons-diamond"></i>
                <span>Hotels</span>
            </a>
            <div class="sidebar-submenu">

                <ul>
                  <li><a href="{{ url('dash/hotels')}}" title="Buttons"><span>All Hotels</span></a></li>
                  <li><a href="{{ url('dash/hotels/create')}}" title="Buttons"><span>Create</span></a></li>
                </ul>

            </div><!-- .sidebar-submenu -->
        </li>
        <li>
            <a href="javascript:void(0);" title="Tours">
                <i class="glyph-icon icon-linecons-lightbulb"></i>
                <span>Tour</span>
            </a>
            <div class="sidebar-submenu">

                <ul>
                    <li><a href="{{  url('dash/tours') }}" title="Tours"><span>All Tours</span></a></li>
                    <li><a href="tile-boxes.html" title="Tile boxes"><span>Tile boxes</span></a></li>
                </ul>

            </div><!-- .sidebar-submenu -->
        </li>
        <li>
            <a href="javascript:void(0);" title="Vehicle">
                <i class="glyph-icon icon-linecons-wallet"></i>
                <span>Vehicle</span>
            </a>
            <div class="sidebar-submenu">

                <ul>
                    <li><a href="{{ url('dash/vehicles') }}" title="Vehicles"><span>Vehicles</span></a></li>
                    <li><a href="#" title="Collapsables"><span>New Vehicle</span></a></li>
                </ul>

            </div><!-- .sidebar-submenu -->
        </li>
        <li>
            <a href="javascript:void(0);" title="Venues">
                <i class="glyph-icon icon-linecons-eye"></i>
                <span>Venues</span>
            </a>
            <div class="sidebar-submenu">

                <ul>
                    <li><a href="{{ url('dash/venues') }}" title="Form elements"><span>All Venues</span></a></li>
                    <li><a href="{{ url('dash/venues/create') }}l" title="Form validation"><span>Form validation</span></a></li>
                </ul>

            </div><!-- .sidebar-submenu -->
        </li>
        <li>
            <a href="javascript:void(0);" title="Carousels">
                <i class="glyph-icon icon-linecons-eye"></i>
                <span>Carousels</span>
            </a>
            <div class="sidebar-submenu">

                <ul>
                    <li><a href="{{ url('dash/carousel') }}" title="All Carousels"><span>All Carousels</span></a></li>
                    <li><a href="{{ url('dash/carousel/create') }}" title="Add New Carousel"><span>Add New</span></a></li>
                </ul>

            </div><!-- .sidebar-submenu -->
        </li>

    </ul><!-- #sidebar-menu -->
</div>
