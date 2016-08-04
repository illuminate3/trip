<!DOCTYPE html>
<html lang="en">
<head>

    <style>
        #loading .svg-icon-loader {position: absolute;top: 50%;left: 50%;margin: -50px 0 0 -50px;}
    </style>


    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title> Nep Trip | Dashboard </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Favicons -->

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/images/icons/apple-touch-icon-144-precomposed.png') }}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset("assets/images/icons/apple-touch-icon-114-precomposed.png") }}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset("assets/images/icons/apple-touch-icon-72-precomposed.png") }}">
    <link rel="apple-touch-icon-precomposed" href="{{ asset("assets/images/icons/apple-touch-icon-57-precomposed.png") }}">
    <link rel="shortcut icon" href="{{ asset("assets/images/icons/favicon.png") }}">

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"   integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <!-- HELPERS -->

    <link rel="stylesheet" type="text/css" href="{{ asset("assets/helpers/animate.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/helpers/boilerplate.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/helpers/border-radius.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/helpers/grid.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/helpers/page-transitions.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/helpers/spacing.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/helpers/typography.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/helpers/utils.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/helpers/colors.css") }}">

    <!-- MATERIAL -->

    <link rel="stylesheet" type="text/css" href="{{ asset("assets/material/ripple.css") }}">

    <!-- ELEMENTS -->

    <link rel="stylesheet" type="text/css" href="{{ asset("assets/elements/badges.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/elements/buttons.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/elements/content-box.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/elements/dashboard-box.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/elements/forms.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/elements/images.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/elements/info-box.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/elements/invoice.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/elements/loading-indicators.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/elements/menus.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/elements/panel-box.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/elements/response-messages.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/elements/responsive-tables.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/elements/ribbon.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/elements/social-box.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/elements/tables.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/elements/tile-box.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/elements/timeline.css") }}">

    <!-- ICONS -->

    <link rel="stylesheet" type="text/css" href="{{asset("assets/icons/fontawesome/fontawesome.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/icons/linecons/linecons.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/icons/spinnericon/spinnericon.css")}}">


    <!-- WIDGETS -->

    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/accordion-ui/accordion.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/calendar/calendar.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/carousel/carousel.css")}}">

    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/charts/justgage/justgage.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/charts/morris/morris.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/charts/piegage/piegage.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/charts/xcharts/xcharts.css")}}">

    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/chosen/chosen.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/colorpicker/colorpicker.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/datatable/datatable.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/datepicker/datepicker.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/datepicker-ui/datepicker.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/daterangepicker/daterangepicker.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/dialog/dialog.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/dropdown/dropdown.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/dropzone/dropzone.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/file-input/fileinput.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/input-switch/inputswitch.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/input-switch/inputswitch-alt.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/ionrangeslider/ionrangeslider.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/jcrop/jcrop.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/jgrowl-notifications/jgrowl.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/loading-bar/loadingbar.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/maps/vector-maps/vectormaps.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/markdown/markdown.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/modal/modal.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/multi-select/multiselect.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/multi-upload/fileupload.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/nestable/nestable.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/noty-notifications/noty.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/popover/popover.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/pretty-photo/prettyphoto.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/progressbar/progressbar.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/range-slider/rangeslider.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/slidebars/slidebars.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/slider-ui/slider.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/summernote-wysiwyg/summernote-wysiwyg.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/tabs-ui/tabs.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/timepicker/timepicker.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/tocify/tocify.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/tooltip/tooltip.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/touchspin/touchspin.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/uniform/uniform.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/wizard/wizard.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/widgets/xeditable/xeditable.css")}}">

    <!-- SNIPPETS -->

    <link rel="stylesheet" type="text/css" href="{{asset("assets/snippets/chat.css") }}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/snippets/files-box.css") }}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/snippets/login-box.css") }}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/snippets/notification-box.css") }}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/snippets/progress-box.css") }}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/snippets/todo.css") }}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/snippets/user-profile.css") }}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/snippets/mobile-navigation.css") }}">

    <!-- APPLICATIONS -->

    <link rel="stylesheet" type="text/css" href="{{ asset("assets/applications/mailbox.css") }}">

    <!-- Admin theme -->

    <link rel="stylesheet" type="text/css" href="{{ asset("assets/themes/admin/layout.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/themes/admin/color-schemes/default.css") }}">

    <!-- Components theme -->

    <link rel="stylesheet" type="text/css" href="{{ asset("assets/themes/components/default.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/themes/components/border-radius.css") }}">

    <!-- Admin responsive -->

    <link rel="stylesheet" type="text/css" href="{{ asset("assets/helpers/responsive-elements.css") }}">
    <link rel="stylesheet" type="text/css" href="{{ asset("assets/helpers/admin-responsive.css") }}">

    <!-- JS Core -->

    <script type="text/javascript" src="{{asset("assets/js-core/jquery-core.js") }}"></script>
    <script type="text/javascript" src="{{asset("assets/js-core/jquery-ui-core.js") }}"></script>
    <script type="text/javascript" src="{{asset("assets/js-core/jquery-ui-widget.js") }}"></script>
    <script type="text/javascript" src="{{asset("assets/js-core/jquery-ui-mouse.js") }}"></script>
    <script type="text/javascript" src="{{asset("assets/js-core/jquery-ui-position.js") }}"></script>
    <script type="text/javascript" src="{{asset("assets/js-core/transition.js") }}"></script>
    <script type="text/javascript" src="{{asset("assets/js-core/modernizr.js") }}"></script>
    <script type="text/javascript" src="{{asset("assets/js-core/jquery-cookie.js") }}"></script>


    <link rel="stylesheet" href="{{ asset("css/dash/style.css") }}">



    <script type="text/javascript">
        $(window).load(function(){
            setTimeout(function() {
                $('#loading').fadeOut( 400, "linear" );
            }, 300);
        });
    </script>



</head>


<body>
<div id="sb-site">
    <div class="sb-slidebar bg-black sb-left sb-style-overlay">
        <div class="scrollable-content scrollable-slim-sidebar">
            <!-- <div class="pad10A">
                <div class="divider-header">Online</div>
                <ul class="chat-box">
                    <li>
                        <div class="status-badge">
                            <img class="img-circle" width="40" src="{{ asset("assets/image-resources/people/testimonial1.jpg") }}" alt="">
                            <div class="small-badge bg-green"></div>
                        </div>
                        <b>
                            Grace Padilla
                        </b>
                        <p>On the other hand, we denounce...</p>
                        <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                    </li>
                    <li>
                        <div class="status-badge">
                            <img class="img-circle" width="40" src="{{ asset("assets/image-resources/people/testimonial2.jpg") }}" alt="">
                            <div class="small-badge bg-green"></div>
                        </div>
                        <b>
                            Carl Gamble
                        </b>
                        <p>Dislike men who are so beguiled...</p>
                        <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                    </li>
                    <li>
                        <div class="status-badge">
                            <img class="img-circle" width="40" src="{{ asset("assets/image-resources/people/testimonial3.jpg") }}" alt="">
                            <div class="small-badge bg-green"></div>
                        </div>
                        <b>
                            Michael Poole
                        </b>
                        <p>Of pleasure of the moment, so...</p>
                        <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                    </li>
                    <li>
                        <div class="status-badge">
                            <img class="img-circle" width="40" src="{{ asset("assets/image-resources/people/testimonial4.jpg") }}" alt="">
                            <div class="small-badge bg-green"></div>
                        </div>
                        <b>
                            Bill Green
                        </b>
                        <p>That they cannot foresee the...</p>
                        <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                    </li>
                    <li>
                        <div class="status-badge">
                            <img class="img-circle" width="40" src="{{ asset("assets/image-resources/people/testimonial5.jpg") }}" alt="">
                            <div class="small-badge bg-green"></div>
                        </div>
                        <b>
                            Cheryl Soucy
                        </b>
                        <p>Pain and trouble that are bound...</p>
                        <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                    </li>
                </ul>
                <div class="divider-header">Idle</div>
                <ul class="chat-box">
                    <li>
                        <div class="status-badge">
                            <img class="img-circle" width="40" src="{{ asset("assets/image-resources/people/testimonial6.jpg") }}" alt="">
                            <div class="small-badge bg-orange"></div>
                        </div>
                        <b>
                            Jose Kramer
                        </b>
                        <p>Equal blame belongs to those...</p>
                        <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                    </li>
                    <li>
                        <div class="status-badge">
                            <img class="img-circle" width="40" src="{{ asset("assets/image-resources/people/testimonial7.jpg") }}" alt="">
                            <div class="small-badge bg-orange"></div>
                        </div>
                        <b>
                            Dan Garcia
                        </b>
                        <p>Weakness of will, which is same...</p>
                        <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                    </li>
                    <li>
                        <div class="status-badge">
                            <img class="img-circle" width="40" src="{{ asset("assets/image-resources/people/testimonial8.jpg") }}" alt="">
                            <div class="small-badge bg-orange"></div>
                        </div>
                        <b>
                            Edward Bridges
                        </b>
                        <p>These cases are perfectly simple...</p>
                        <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                    </li>
                </ul>
                <div class="divider-header">Offline</div>
                <ul class="chat-box">
                    <li>
                        <div class="status-badge">
                            <img class="img-circle" width="40" src="{{ asset("assets/image-resources/people/testimonial1.jpg") }}" alt="">
                            <div class="small-badge bg-red"></div>
                        </div>
                        <b>
                            Randy Herod
                        </b>
                        <p>In a free hour, when our power...</p>
                        <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                    </li>
                    <li>
                        <div class="status-badge">
                            <img class="img-circle" width="40" src="{{ asset("assets/image-resources/people/testimonial2.jpg") }}" alt="">
                            <div class="small-badge bg-red"></div>
                        </div>
                        <b>
                            Patricia Bagley
                        </b>
                        <p>when nothing prevents our being...</p>
                        <a href="#" class="btn btn-md no-border radius-all-100 btn-black"><i class="glyph-icon icon-comments-o"></i></a>
                    </li>
                </ul>
            </div> -->
        </div>
    </div>

    <div class="sb-slidebar bg-black sb-right sb-style-overlay">
        <div class="scrollable-content scrollable-slim-sidebar">
            <div class="pad15A">
                <a href="#" title="" data-toggle="collapse" data-target="#sidebar-toggle-1" class="popover-title">
                    Cloud status
                    <span class="caret"></span>
                </a>
                <div id="sidebar-toggle-1" class="collapse in">
                    <!-- <div class="pad15A">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-center font-gray pad5B text-transform-upr font-size-12">New visits</div>
                                <div class="chart-alt-3 font-gray-dark" data-percent="55"><span>55</span>%</div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center font-gray pad5B text-transform-upr font-size-12">Bounce rate</div>
                                <div class="chart-alt-3 font-gray-dark" data-percent="46"><span>46</span>%</div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center font-gray pad5B text-transform-upr font-size-12">Server load</div>
                                <div class="chart-alt-3 font-gray-dark" data-percent="92"><span>92</span>%</div>
                            </div>
                        </div>
                        <div class="divider mrg15T mrg15B"></div>
                        <div class="text-center">
                            <a href="#" class="btn center-div btn-info mrg5T btn-sm text-transform-upr updateEasyPieChart">
                                <i class="glyph-icon icon-refresh"></i>
                                Update charts
                            </a>
                        </div>
                    </div> -->
                </div>

                <div class="clear"></div>

                <a href="#" title="" data-toggle="collapse" data-target="#sidebar-toggle-6" class="popover-title">
                    Latest transfers
                    <span class="caret"></span>
                </a>
                <div id="sidebar-toggle-6" class="collapse in">

                    <!-- <ul class="files-box">
                        <li>
                            <i class="files-icon glyph-icon font-red icon-file-archive-o"></i>
                            <div class="files-content">
                                <b>blog_export.zip</b>
                                <div class="files-date">
                                    <i class="glyph-icon icon-clock-o"></i>
                                    added on <b>22.10.2014</b>
                                </div>
                            </div>
                            <div class="files-buttons">
                                <a href="#" class="btn btn-xs hover-info tooltip-button" data-placement="left" title="Download">
                                    <i class="glyph-icon icon-cloud-download"></i>
                                </a>
                                <a href="#" class="btn btn-xs hover-danger tooltip-button" data-placement="left" title="Delete">
                                    <i class="glyph-icon icon-times"></i>
                                </a>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <i class="files-icon glyph-icon icon-file-code-o"></i>
                            <div class="files-content">
                                <b>homepage-test.html</b>
                                <div class="files-date">
                                    <i class="glyph-icon icon-clock-o"></i>
                                    added  <b>19.10.2014</b>
                                </div>
                            </div>
                            <div class="files-buttons">
                                <a href="#" class="btn btn-xs hover-info tooltip-button" data-placement="left" title="Download">
                                    <i class="glyph-icon icon-cloud-download"></i>
                                </a>
                                <a href="#" class="btn btn-xs hover-danger tooltip-button" data-placement="left" title="Delete">
                                    <i class="glyph-icon icon-times"></i>
                                </a>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <i class="files-icon glyph-icon font-yellow icon-file-image-o"></i>
                            <div class="files-content">
                                <b>monthlyReport.jpg</b>
                                <div class="files-date">
                                    <i class="glyph-icon icon-clock-o"></i>
                                    added on <b>10.9.2014</b>
                                </div>
                            </div>
                            <div class="files-buttons">
                                <a href="#" class="btn btn-xs hover-info tooltip-button" data-placement="left" title="Download">
                                    <i class="glyph-icon icon-cloud-download"></i>
                                </a>
                                <a href="#" class="btn btn-xs hover-danger tooltip-button" data-placement="left" title="Delete">
                                    <i class="glyph-icon icon-times"></i>
                                </a>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <i class="files-icon glyph-icon font-green icon-file-word-o"></i>
                            <div class="files-content">
                                <b>new_presentation.doc</b>
                                <div class="files-date">
                                    <i class="glyph-icon icon-clock-o"></i>
                                    added on <b>5.9.2014</b>
                                </div>
                            </div>
                            <div class="files-buttons">
                                <a href="#" class="btn btn-xs hover-info tooltip-button" data-placement="left" title="Download">
                                    <i class="glyph-icon icon-cloud-download"></i>
                                </a>
                                <a href="#" class="btn btn-xs hover-danger tooltip-button" data-placement="left" title="Delete">
                                    <i class="glyph-icon icon-times"></i>
                                </a>
                            </div>
                        </li>
                    </ul> -->

                </div>

                <div class="clear"></div>

                <a href="#" title="" data-toggle="collapse" data-target="#sidebar-toggle-3" class="popover-title">
                    Tasks for today
                    <span class="caret"></span>
                </a>
                <div id="sidebar-toggle-3" class="collapse in">

                    <!-- <ul class="progress-box">
                        <li>
                            <div class="progress-title">
                                New features development
                                <b>87%</b>
                            </div>
                            <div class="progressbar-smaller progressbar" data-value="87">
                                <div class="progressbar-value bg-azure">
                                    <div class="progressbar-overlay"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="progress-title">
                                Finishing uploading files
                                <b>66%</b>
                            </div>
                            <div class="progressbar-smaller progressbar" data-value="66">
                                <div class="progressbar-value bg-red">
                                    <div class="progressbar-overlay"></div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="progress-title">
                                Creating tutorials
                                <b>58%</b>
                            </div>
                            <div class="progressbar-smaller progressbar" data-value="58">
                                <div class="progressbar-value bg-blue-alt"></div>
                            </div>
                        </li>
                        <li>
                            <div class="progress-title">
                                Frontend bonus theme
                                <b>74%</b>
                            </div>
                            <div class="progressbar-smaller progressbar" data-value="74">
                                <div class="progressbar-value bg-purple"></div>
                            </div>
                        </li>
                    </ul> -->

                </div>

                <div class="clear"></div>

                <a href="#" title="" data-toggle="collapse" data-target="#sidebar-toggle-4" class="popover-title">
                    Pending notifications
                    <span class="bs-label bg-orange tooltip-button" title="Label example">New</span>
                    <span class="caret"></span>
                </a>
                <div id="sidebar-toggle-4" class="collapse in">
                    <!-- <ul class="notifications-box notifications-box-alt"> -->
                        <li>
                            <span class="bg-purple icon-notification glyph-icon icon-users"></span>
                            <span class="notification-text">This is an error notification</span>
                            <div class="notification-time">
                                a few seconds ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                            <a href="#" class="notification-btn btn btn-xs btn-black tooltip-button" data-placement="left" title="View details">
                                <i class="glyph-icon icon-arrow-right"></i>
                            </a>
                        </li>
                        <li>
                            <span class="bg-warning icon-notification glyph-icon icon-ticket"></span>
                            <span class="notification-text">This is a warning notification</span>
                            <div class="notification-time">
                                <b>15</b> minutes ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                            <a href="#" class="notification-btn btn btn-xs btn-black tooltip-button" data-placement="left" title="View details">
                                <i class="glyph-icon icon-arrow-right"></i>
                            </a>
                        </li>
                        <li>
                            <span class="bg-green icon-notification glyph-icon icon-random"></span>
                            <span class="notification-text font-green">A success message example.</span>
                            <div class="notification-time">
                                <b>2 hours</b> ago
                                <span class="glyph-icon icon-clock-o"></span>
                            </div>
                            <a href="#" class="notification-btn btn btn-xs btn-black tooltip-button" data-placement="left" title="View details">
                                <i class="glyph-icon icon-arrow-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div id="loading">
        <div class="svg-icon-loader">
            <img src="../../assets/images/svg-loaders/bars.svg" width="40" alt="">
        </div>
    </div>

    <div id="page-wrapper">
        <div id="mobile-navigation">
            <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar"><span></span></button>
        </div>
        <div id="page-sidebar">
            @include('dashboard._sidebar')
        </div>
        <div id="page-content-wrapper">
            <div id="page-content">
                <div id="page-header">
                    @include('dashboard._header')
                </div>




                <!-- Bootstrap Daterangepicker -->

                <!--<link rel="stylesheet" type="text/css" href="../../assets/widgets/daterangepicker/daterangepicker.css">-->
                <script type="text/javascript" src="{{ asset("assets/widgets/daterangepicker/moment.js") }}"></script>
                <script type="text/javascript" src="{{ asset("assets/widgets/daterangepicker/daterangepicker.js") }}"></script>
                <script type="text/javascript" src="{{ asset("assets/widgets/daterangepicker/daterangepicker-demo.js") }}"></script>

                <!-- Sparklines charts -->

                <script type="text/javascript" src="{{ asset("assets/widgets/charts/sparklines/sparklines.js") }}"></script>
                <script type="text/javascript" src="{{ asset("assets/widgets/charts/sparklines/sparklines-demo.js") }}"></script>

                <div id="page-title">
                    <h2>@yield('page-title')</h2>
                    <p>@yield('page-description')</p>


                </div>

                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>




    <!-- WIDGETS -->

    <!-- Bootstrap Dropdown -->

    <script type="text/javascript" src="{{ asset("assets/widgets/dropdown/dropdown.js") }}"></script>

    <!-- Bootstrap Tooltip -->

    <script type="text/javascript" src="{{ asset("assets/widgets/tooltip/tooltip.js") }}"></script>

    <!-- Bootstrap Popover -->

    <script type="text/javascript" src="{{ asset("assets/widgets/popover/popover.js") }}"></script>

    <!-- Bootstrap Progress Bar -->

    <script type="text/javascript" src="{{ asset("assets/widgets/progressbar/progressbar.js") }}"></script>

    <!-- Bootstrap Buttons -->

    <script type="text/javascript" src="{{ asset("assets/widgets/button/button.js") }}"></script>

    <!-- Bootstrap Collapse -->

    <script type="text/javascript" src="{{ asset("assets/widgets/collapse/collapse.js") }}"></script>

    <!-- Superclick -->

    <script type="text/javascript" src="{{ asset("assets/widgets/superclick/superclick.js") }}"></script>

    <!-- Input switch alternate -->

    <script type="text/javascript" src="{{ asset("assets/widgets/input-switch/inputswitch-alt.js") }}"></script>

    <!-- Slim scroll -->

    <script type="text/javascript" src="{{ asset("assets/widgets/slimscroll/slimscroll.js") }}"></script>

    <!-- Slidebars -->

    <script type="text/javascript" src="{{ asset("assets/widgets/slidebars/slidebars.js") }}"></script>
    <script type="text/javascript" src="{{ asset("assets/widgets/slidebars/slidebars-demo.js") }}"></script>

    <!-- PieGage -->

    <script type="text/javascript" src="{{ asset("assets/widgets/charts/piegage/piegage.js") }}"></script>
    <script type="text/javascript" src="{{ asset("assets/widgets/charts/piegage/piegage-demo.js") }}"></script>

    <!-- Screenfull -->

    <script type="text/javascript" src="{{ asset("assets/widgets/screenfull/screenfull.js") }}"></script>

    <!-- Content box -->

    <script type="text/javascript" src="{{ asset("assets/widgets/content-box/contentbox.js") }}"></script>

    <!-- Material -->

    <script type="text/javascript" src="{{ asset("assets/widgets/material/material.js") }}"></script>
    <script type="text/javascript" src="{{ asset("assets/widgets/material/ripples.js") }}"></script>


    <!-- Overlay -->

    <script type="text/javascript" src="{{ asset("assets/widgets/overlay/overlay.js") }}"></script>

    <!-- Widgets init for demo -->

    <script type="text/javascript" src="{{ asset("assets/js-init/widgets-init.js") }}"></script>

    <!-- Theme layout -->

    <script type="text/javascript" src="{{ asset("assets/themes/admin/layout.js") }}"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script>
        /*!
        * IE10 viewport hack for Surface/desktop Windows 8 bug
        * Copyright 2014-2015 Twitter, Inc.
        * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
        */

        // See the Getting Started docs for more information:
        // http://getbootstrap.com/getting-started/#support-ie10-width

        (function () {
            $('[data-toggle="popover"]').popover();

            'use strict';

            if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
                var msViewportStyle = document.createElement('style')
                msViewportStyle.appendChild(
                    document.createTextNode(
                      '@-ms-viewport{width:auto!important}'
                    )
                )
                document.querySelector('head').appendChild(msViewportStyle)
                }
        })();

        /**
         * To auto-hide all alerts, except danger
         */
        $('div.alert').not('div.alert-danger').delay(4000).slideUp();

        /**
         * To use the bootstrap tooltip popups.
         */
        $('[data-toggle="tooltip"]').tooltip({
            container: 'body',
            trigger:'click hover focus'
        });

        /*!
         * For Delete Modal prompts
         * 
         */
        $('button[type="submit"]').click(function(e) {
            if ( $(this).hasClass('btn-danger') ) {
                var currentForm = this.closest("form");
                e.preventDefault();
                swal({
                   title: "Are you sure?",
                   text: "You will not be able to recover this object.",
                   type: "warning",
                   showCancelButton: true,
                   confirmButtonColor: "#DD6B55",
                   confirmButtonText: "Yes, delete it!",
                   cancelButtonText: "No, keep it.",
                   closeOnConfirm: true,
                   closeOnCancel: false
                    },
                    function(isConfirm){
                        if (isConfirm) {
                            currentForm.submit();
                        } else {
                             swal({
                                title: "Cancelled!",
                                text: 'Object not deleted. <br /> <em><small>(I will close in 2 seconds)</em></small>',
                                timer: 2000,
                                showConfirmButton: true,
                                confirmButtonText: "Close now.",
                                type: 'error',
                                html: true
                             });
                        }
                    }
                );
            }
        });
    </script>

    @yield('footer_assets')
    @yield('script');

</body>
</html>
