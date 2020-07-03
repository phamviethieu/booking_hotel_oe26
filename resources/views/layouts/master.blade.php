<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <script src="{{ asset('bower_components/style_project1/js/headerGoogletagmanager.js') }}"></script>
    <title> @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/style_project1/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/style_project1/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/style_project1/css/bootstrap-submenu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/style_project1/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/style_project1/fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/style_project1/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/style_project1/fonts/linearicons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/style_project1/css/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/style_project1/css/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/style_project1/css/style.css') }}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('bower_components/style_project1/css/skins/blue-light-2.css') }}">
    <link rel="shortcut icon" href="{{ asset('bower_components/style_project1/img/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/style_project1/css/fontOpenSans.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/style_project1/css/ie10-viewport-bug-workaround.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/sweetalert2/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" />
</head>
<body>

    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')

    <script type="text/javascript" src="{{ asset('bower_components/style_project1/js/jquery-2.2.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/style_project1/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/admin-lte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/style_project1/js/bootstrap-submenu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/style_project1/js/jquery.mb.YTPlayer.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/style_project1/js/wow.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/style_project1/js/bootstrap-select.min.js') }} "></script>
    <script type="text/javascript" src="{{ asset('bower_components/style_project1/js/jquery.easing.1.3.js') }} "></script>
    <script type="text/javascript" src="{{ asset('bower_components/style_project1/js/jquery.scrollUp.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/style_project1/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/style_project1/js/jquery.filterizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/style_project1/js/bootstrap-datepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/moment/min/moment.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/style_project1/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('bower_components/style_project1/js/ie10-viewport-bug-workaround.js') }}"></script>
    @yield('script')
</body>
</html>
