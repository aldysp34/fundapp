<!DOCTYPE html>
<html lang="en"
      dir="ltr">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
              content="IE=edge">
        <meta name="viewport"
              content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title')</title>

        <!-- Prevent the demo from appearing in search engines -->
        <meta name="robots"
              content="noindex">

        <link href="https://fonts.googleapis.com/css?family=Lato:400,700%7COswald:300,400,500,700%7CRoboto:400,500%7CExo+2:600&display=swap"
              rel="stylesheet">

        <!-- Perfect Scrollbar -->
        <link type="text/css"
              href="{{asset('assets/vendor/perfect-scrollbar.css')}}"
              rel="stylesheet">

        <!-- Material Design Icons -->
        <link type="text/css"
              href="{{asset('assets/css/material-icons.css')}}"
              rel="stylesheet">

        <!-- Font Awesome Icons -->
        <link type="text/css"
              href="{{asset('assets/css/fontawesome.css')}}"
              rel="stylesheet">

        <!-- Preloader -->
        <link type="text/css"
              href="{{asset('assets/vendor/spinkit.css')}}"
              rel="stylesheet">
        <link type="text/css"
              href="{{asset('assets/css/preloader.css')}}"
              rel="stylesheet">

        <!-- App CSS -->
        <link type="text/css"
              href="{{asset('assets/css/app.css')}}"
              rel="stylesheet">

        <!-- Dark Mode CSS (optional) -->
        <link type="text/css"
              href="{{asset('assets/css/dark-mode.css')}}"
              rel="stylesheet">

        <!-- Vector Maps -->
        <link type="text/css"
              href="{{asset('assets/vendor/jqvmap/jqvmap.min.css')}}"
              rel="stylesheet">

    </head>

    <body class="layout-sticky layout-sticky-subnav ">

        <div class="preloader">
            <div class="sk-chase">
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
            </div>

            <!-- <div class="sk-bounce">
    <div class="sk-bounce-dot"></div>
    <div class="sk-bounce-dot"></div>
  </div> -->

            <!-- More spinner examples at https://github.com/tobiasahlin/SpinKit/blob/master/examples.html -->
        </div>

        <!-- Header Layout -->
        <div class="mdk-header-layout js-mdk-header-layout">

            <!-- Header -->

            <div id="header"
                 class="mdk-header js-mdk-header mb-0"
                 data-fixed>
                <div class="mdk-header__content">

                <div class="navbar navbar-expand navbar-shadow px-0  pl-lg-16pt navbar-light bg-body" id="default-navbar" data-primary>

                    <!-- Navbar toggler -->
                    <button class="navbar-toggler d-block d-lg-none rounded-0"
                            type="button"
                            data-toggle="sidebar">
                        <span class="material-icons">menu</span>
                    </button>

                    <!-- Navbar Brand -->
                    <div
                        class="navbar-brand mr-16pt d-lg-none">
                        <img class="navbar-brand-icon mr-0 mr-lg-8pt"
                            src="{{asset('assets/images/logo/accent-teal-100@2x.png')}}"
                            width="32"
                            alt="Huma">
                        <span class="d-none d-lg-block">Huma</span>
                    </div>

                    <!-- <button class="btn navbar-btn mr-16pt" data-toggle="modal" data-target="#apps">Apps <i class="material-icons">arrow_drop_down</i></button> -->


                    <div class="flex"></div>


                    <div class="nav navbar-nav flex-nowrap d-flex ml-0 mr-16pt">
                        <div class="nav-item dropdown d-none d-sm-flex">
                            <a href="#"
                                class="nav-link d-flex align-items-center dropdown-toggle"
                                data-toggle="dropdown">
                                <span class="flex d-flex flex-column mr-8pt">
                                    <span class="navbar-text-100">@yield('name')</span>
                                    <small class="navbar-text-50">@yield('role')</small>
                                    <small class="navbar-text-50">@yield('bidang')</small>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <div class="dropdown-header"><strong>Account</strong></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <!-- // END Header -->

            <!-- Header Layout Content -->
            <div class="mdk-header-layout__content">

                <!-- Drawer Layout -->
                <div class="mdk-drawer-layout js-mdk-drawer-layout"
                     data-push
                     data-responsive-width="992px">

                    <!-- Drawer Layout Content -->
                    @yield('content')
                    <!-- // END drawer-layout__content -->

                    <!-- drawer -->
                    <div class="mdk-drawer js-mdk-drawer"
                         id="default-drawer">
                        <div class="mdk-drawer__content top-md-navbar">
                            <div class="sidebar sidebar-dark sidebar-left sidebar-p-t"
                                 data-perfect-scrollbar>

                                <a href="sticky-index.html"
                                   class="sidebar-brand d-sm-none ">
                                    <img class="sidebar-brand-icon"
                                         src="{{asset('assets/images/logo/accent-teal-100@2x.png')}}"
                                         alt="Peparda">
                                    <span>PEPARDA</span>
                                </a>

                                <div class="sidebar-heading">Main Menu</div>
                                <ul class="sidebar-menu">
                                    <li class="sidebar-menu-item active">
                                        <a class="sidebar-menu-button"
                                           href="sticky-index.html">
                                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">insert_chart_outlined</span>
                                            <span class="sidebar-menu-text">Dashboard</span>
                                        </a>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           data-toggle="collapse"
                                           href="#proposal_menu">
                                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">book</span>
                                            Proposal
                                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                        </a>
                                        <ul class="sidebar-submenu collapse sm-indent"
                                            id="proposal_menu">
                                            <li class="sidebar-menu-item active">
                                                <a class="sidebar-menu-button"
                                                   href="sticky-index.html">
                                                    <span class="sidebar-menu-text">Termin 1</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="sticky-analytics.html">
                                                    <span class="sidebar-menu-text">Termin 2</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="sidebar-menu-item">
                                        <a class="sidebar-menu-button"
                                           data-toggle="collapse"
                                           href="#spj_menu">
                                            <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">notes</span>
                                            SPJ
                                            <span class="ml-auto sidebar-menu-toggle-icon"></span>
                                        </a>
                                        <ul class="sidebar-submenu collapse sm-indent"
                                            id="spj_menu">
                                            <li class="sidebar-menu-item active">
                                                <a class="sidebar-menu-button"
                                                   href="sticky-index.html">
                                                    <span class="sidebar-menu-text">Termin 1</span>
                                                </a>
                                            </li>
                                            <li class="sidebar-menu-item">
                                                <a class="sidebar-menu-button"
                                                   href="sticky-analytics.html">
                                                    <span class="sidebar-menu-text">Termin 2</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>

                                
                        </div>
                    </div>
                    <!-- // END drawer -->
                </div>
                <!-- // END drawer-layout -->

            </div>
            <!-- // END Header Layout Content -->

        </div>
        <!-- // END Header Layout -->

        <!-- App Settings FAB -->
        <div id="app-settings">
            <app-settings layout-active="sticky"
                          :layout-location="{
      'compact': 'compact-index.html',
      'mini': 'mini-index.html',
      'app': 'index.html',
      'boxed': 'boxed-index.html',
      'sticky': 'sticky-index.html',
      'default': 'fixed-index.html'
    }"
                          sidebar-type="light"
                          sidebar-variant="bg-body"></app-settings>
        </div>
        <!-- jQuery -->
        <script src="{{asset('assets/vendor/jquery.min.js')}}"></script>

        <!-- Bootstrap -->
        <script src="{{asset('assets/vendor/popper.min.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap.min.js')}}"></script>

        <!-- Perfect Scrollbar -->
        <script src="{{asset('assets/vendor/perfect-scrollbar.min.js')}}"></script>

        <!-- DOM Factory -->
        <script src="{{asset('assets/vendor/dom-factory.js')}}"></script>

        <!-- MDK -->
        <script src="{{asset('assets/vendor/material-design-kit.js')}}"></script>

        <!-- App JS -->
        <script src="{{asset('assets/js/app.js')}}"></script>

        <!-- Highlight.js -->
        <script src="{{asset('assets/js/hljs.js')}}"></script>

        <!-- Global Settings -->
        <script src="{{asset('assets/js/settings.js')}}"></script>

        <!-- Flatpickr -->
        <script src="{{asset('assets/vendor/flatpickr/flatpickr.min.js')}}"></script>
        <script src="{{asset('assets/js/flatpickr.js')}}"></script>

        <!-- Moment.js -->
        <script src="{{asset('assets/vendor/moment.min.js')}}"></script>
        <script src="{{asset('assets/vendor/moment-range.js')}}"></script>

        <!-- Chart.js -->
        <script src="{{asset('assets/vendor/Chart.min.js')}}"></script>
        <script src="{{asset('assets/js/chartjs.js')}}"></script>

        <!-- Chart.js Samples -->
        <script src="{{asset('assets/js/page.analytics-dashboard.js')}}"></script>

        <!-- Vector Maps -->
        <script src="{{asset('assets/vendor/jqvmap/jquery.vmap.min.js')}}"></script>
        <script src="{{asset('assets/vendor/jqvmap/maps/jquery.vmap.world.js')}}"></script>
        <script src="{{asset('assets/js/vector-maps.js')}}"></script>

        <!-- List.js -->
        <script src="{{asset('assets/vendor/list.min.js')}}"></script>
        <script src="{{asset('assets/js/list.js')}}"></script>

        <!-- Tables -->
        <script src="{{asset('assets/js/toggle-check-all.js')}}"></script>
        <script src="{{asset('assets/js/check-selected-row.js')}}"></script>

        <!-- App Settings (safe to remove) -->
        <script src="{{asset('assets/js/app-settings.js')}}"></script>
        @yield('new-script')
    </body>

</html>