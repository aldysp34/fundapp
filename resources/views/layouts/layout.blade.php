<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"
                content="IE=edge">
        <meta name="viewport"
                content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>


    </head>
    
    <body class="layout-app layout-sticky-subnav has-drawer-opened">

        <!-- @include('layouts.partials.loader') -->
        <div class="mdk-drawer-layout js-mdk-drawer-layout" data-push data-responsive-width="992px">
            <div class="mdk-drawer-layout__content page-content">
                
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

                
            <div class="border-bottom-2 py-32pt position-relative z-1">
                <div class="container-fluid page__container d-flex flex-column flex-md-row align-items-center text-center text-sm-left">
                    <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">

                        <div class="mb-24pt mb-sm-0 mr-sm-24pt">
                            @yield('content-header')
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid page__container">
                <div class="page-section">
                    @yield('content-section')
                </div>
            </div>

            </div>
            <div class="mdk-drawer js-mdk-drawer" id="default-drawer">
                <div class="mdk-drawer__content">
                    <div class="sidebar sidebar-dark sidebar-left" data-perfect-scrollbar>
                        <div class="sidebar-brand ">
                            <img class="sidebar-brand-icon"
                                    src="{{asset('assets/images/kabBekasi.svg')}}"
                                    alt="Huma">
                            <span>PEPARDA</span>
                            <span>KABUPATEN</span>
                            <span>BEKASI</span>
                        </div>
                        @yield('sidebar-content')
                    </div>
                </div>
            </div>

        </div>
        <footer class="js-fix-footer footer border-top-2">
                <div></div>
                <div class="container-fluid page__container page-section d-flex flex-column">
                    <a href="https://www.bekasikab.go.id/">
                        <p class="text-70 brand mb-24pt">
                            <img class="brand-icon"
                                    src="{{asset('assets/images/kabBekasi.svg')}}"
                                    width="30"
                                    alt="Huma"> Pemerintah Kabupaten Bekasi
                        </p>
                    </a>
                    
                    <p class="text-50 small mb-0">Copyright 2022 &copy; All rights reserved.</p>
                </div>
            </footer>

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

            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

            @yield('new_scripts')

    </body>
</html>