<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <script type="text/javascript" src="{{ mix('js/googleTag.js') }}"></script>
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
    <script src="{{ asset('bower_components/style_project1js/ie-emulation-modes-warning.js') }}"></script>
    <script src="{{ asset('bower_components/style_project1/js/ie8-responsive-file-warning.js') }}"></script>
    <script src="{{ asset('bower_components/style_project1/js/ie-emulation-modes-warning.js') }}"></script>
    <script src="{{ asset('bower_components/style_project1/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('bower_components/style_project1/js/respond.min.js') }}"></script>
</head>
<body>
<div class="page_loader"></div>
    @yield('content')
    <script src="{{ asset('bower_components/style_project1/js/jquery-2.2.0.min.js') }}"></script>
    <script src="{{ asset('bower_components/style_project1/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('bower_components/style_project1/js/bootstrap-submenu.js') }}"></script>
    <script src="{{ asset('bower_components/style_project1/js/jquery.mb.YTPlayer.js') }}"></script>
    <script src="{{ asset('bower_components/style_project1/js/wow.min.js') }}"></script>
    <script src="{{ asset('bower_components/style_project1/js/bootstrap-select.min.js') }} "></script>
    <script src="{{ asset('bower_components/style_project1/js/jquery.easing.1.3.js') }} "></script>
    <script src="{{ asset('bower_components/style_project1/js/jquery.scrollUp.js') }}"></script>
    <script src="{{ asset('bower_components/style_project1/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('bower_components/style_project1/js/app.js') }}"></script>
    <script src="{{ asset('bower_components/style_project1/js/ie10-viewport-bug-workaround.js') }}"></script>
</body>
</html>
