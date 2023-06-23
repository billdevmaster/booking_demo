<!DOCTYPE html>
<html class="loading semi-dark-layout" lang="et" data-layout="semi-dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="BOOKid- online broneerimissüsteem. Lihtne ja arusaadav teenuste ja aja broneerimissüsteem.">
    <meta name="keywords" content="broneerimissüsteem, online broneerimine, broneeringud, teenuste broneerimine, aja broneerimine">
    <meta name="author" content="BOOKid">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>BOOKid- online broneerimissüsteemi</title>
    <link rel="apple-touch-icon" href="{{asset('public/assets/backend/app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/assets/backend/app-assets/images/ico/bookid_logo.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/app-assets/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/app-assets/vendors/css/charts/apexcharts.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/app-assets/vendors/css/extensions/toastr.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    @yield('page_vendor_css')
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="../../../app-assets/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/charts/chart-apex.css">
    <link rel="stylesheet" type="text/css" href="../../../app-assets/css/plugins/extensions/ext-component-toastr.css"> --}}
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('public/assets/backend/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/icon.css')}}">
    <!-- END: Custom CSS-->

    <script src="{{asset('public/assets/backend/app-assets/vendors/js/vendors.min.js')}}"></script>
    
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon" data-feather="menu"></i></a></li>
                </ul>
                <ul class="nav navbar-nav">
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style" ><i class="ficon" data-feather="sun"></i></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ml-auto">
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name font-weight-bolder">{{ Auth::user()->name }}  </span><span class="user-status">Admin</span></div><span class="avatar"> <img class="round" src="{{asset('public/assets/backend/app-assets/images/person-icon.png')}}" alt="avatar" height="40" width="40"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="javascript:void(0);"><i class="mr-50" data-feather="user"></i> Profiil</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('backend.signout') }}"><i class="mr-50" data-feather="power"></i> Logi välja</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mr-auto">
                    <a class="navbar-brand" href="{{ route('index') }}">
                        <h2 class="text-white text-bold">{{ env('APP_NAME') }}</h2>
                       
                    </a>
                </li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item @php if($menu == 'home') echo 'active' @endphp"><a class="d-flex align-items-center" href="{{ route('admin') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Home">Töölaud</span></a>
                </li>
                {{-- <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Management Items</span><i data-feather="more-horizontal"></i> --}}
                <li class="nav-item @php if($menu == 'locations') echo 'active' @endphp"><a class="d-flex align-items-center" href="{{ route('admin.locations') }}"><i data-feather='map-pin'></i><span class="menu-title text-truncate" data-i18n="Home">Osakonnad</span></a>
                </li>
                <li class="nav-item @php if($menu == 'services') echo 'active' @endphp"><a class="d-flex align-items-center" href="{{ route('admin.services') }}"><i data-feather='activity'></i><span class="menu-title text-truncate" data-i18n="Home">Teenused</span></a>
                </li>
                <!--<li class="nav-item @php if($menu == 'vechiles') echo 'active' @endphp"><a class="d-flex align-items-center" href="{{ route('admin.vehicles') }}"><i data-feather='truck'></i><span class="menu-title text-truncate" data-i18n="Home">Vehicles</span></a>
                </li>-->
                <li class="nav-item @php if($menu == 'clients') echo 'active' @endphp"><a class="d-flex align-items-center" href="{{ route('admin.clients') }}"><i data-feather='list'></i><span class="menu-title text-truncate" data-i18n="Home">Kliendid</span></a>
                </li>

                <li class="nav-item @php if($menu == 'seaded') echo 'active' @endphp"><a class="d-flex align-items-center" href="{{ route('admin.seaded') }}"><i data-feather='user'></i><span class="menu-title text-truncate" data-i18n="Home">SEADED</span></a>
                </li>

                <li class="nav-item @php if($menu == 'subscribe') echo 'active' @endphp"><a class="d-flex align-items-center" href="{{ route('admin.subscribe') }}"><i data-feather='dollar-sign'></i><span class="menu-title text-truncate" data-i18n="Home">Arveldamine</span></a>
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->

       <!-- BEGIN: Content-->
       <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        @if (Session::has('added'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <div class="alert-body">
                    {{session('added')}}
                </div>
                <button type="button" class="close session-close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @elseif (Session::has('updated'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <div class="alert-body">
                {{session('updated')}}
            </div>
            <button type="button" class="close session-close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif (Session::has('deleted'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <div class="alert-body">
                {{session('deleted')}}
            </div>
            <button type="button" class="close session-close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @yield('content')
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    @if ($menu != 'home') 
        <!-- BEGIN: Footer-->
        <footer class="footer footer-static footer-light">
            <p class="clearfix mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">COPYRIGHT &copy; 2022<a class="ml-25" href="https://bookid.ee/demo/public" target="_blank"> BOOKid</a><span class="d-none d-sm-inline-block">, All rights Reserved</span></span></p>
        </footer>
    @endif
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->
        

    <script>
        var appUrl = "{{ env("APP_URL") }}";
    </script>

    <!-- BEGIN: Vendor JS-->
    
    @yield('vendor_js')
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    @yield('page_vendor_js')
    <script src="{{asset('public/assets/backend/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('public/assets/backend/app-assets/vendors/js/extensions/polyfill.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('public/assets/backend/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('public/assets/backend/app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    @yield('page_js')
    <script src="{{asset('public/assets/backend/assets/js/scripts.js')}}"></script>

    <!-- END: Page JS-->
    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
            $( document ).ready(function() {
                setTimeout(function() {
                    $('.session-close').trigger("click");
                }, 4000);
            });
        });
    </script>
</body>
<!-- END: Body-->

</html>

