<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('bower_components/style_project1/css/admin.css') }}">

    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/dist/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/jqvmap/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/summernote/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/style_project1/fonts/Sourc_Sans_Pro.css') }}" >
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/sweetalert2/sweetalert2.css') }}">
    <link rel="stylesheet" href="{{ asset('bower_components/admin-lte/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('bower_components/chart.js/dist/Chart.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

    @include('admin.layouts.sidebar')
    @include('admin.layouts.navbar')
    @yield('content')
    @include('admin.layouts.footer')

    <script src="{{ asset('bower_components/admin-lte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('bower_components/style_project1/js/ui_button.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/sparklines/sparkline.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/dist/js/adminlte.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/dist/js/pages/dashboard.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/dist/js/demo.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('bower_components/admin-lte/plugins/toastr/toastr.min.js') }}"></script>
    <script src="{{ asset('bower_components/chart.js/dist/Chart.js') }}"></script>
    <script src="{{ asset('bower_components/pusher-js/dist/web/pusher.min.js') }}"></script>
    <script src="{{ mix('/js/pusher.js') }}"></script>

        @yield('script')

    <script src="{{ mix('js/datatable.js') }}"></script>
    <script src="{{ mix('/js/booking.js') }}"></script>
</body>
</html>
