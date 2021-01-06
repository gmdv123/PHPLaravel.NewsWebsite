<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin Panel</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <link href="{{ asset('css/custom2.css') }}" rel="stylesheet">
        <script type="text/javascript" src="/js/scripts.js"></script>
        {{-- * --}}
        <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_asset/plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_asset/plugins/jqvmap/jqvmap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_asset/dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_asset/plugins/daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('admin_asset/plugins/summernote/summernote-bs4.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        {{-- * --}}
        <script src="{{ asset('admin_asset/plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('admin_asset/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <script src="{{ asset('admin_asset/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admin_asset/plugins/chart.js/Chart.min.js') }}"></script>
        <script src="{{ asset('admin_asset/plugins/sparklines/sparkline.js') }}"></script>
        <script src="{{ asset('admin_asset/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('admin_asset/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
        <script src="{{ asset('admin_asset/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
        <script src="{{ asset('admin_asset/plugins/moment/moment.min.js') }}"></script>
        <script src="{{ asset('admin_asset/plugins/daterangepicker/daterangepicker.js') }}"></script>
        <script src="{{ asset('admin_asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
        <script src="{{ asset('admin_asset/plugins/summernote/summernote-bs4.min.js') }}"></script>
        <script src="{{ asset('admin_asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <script src="{{ asset('admin_asset/dist/js/adminlte.js') }}"></script>
        <script src="{{ asset('admin_asset/dist/js/pages/dashboard.js') }}"></script>
        <script src="{{ asset('admin_asset/dist/js/demo.js') }}"></script>
        {{-- * --}}
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        {{-- * --}}
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> 
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> 
        <base href="{{ asset('') }}">
        {{-- * --}}
        @yield('script')
    <body>
        @include('admin.layout.dashboard')
    </body>
</html>
