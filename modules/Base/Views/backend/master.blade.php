<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Admin Page</title>
    <link href="{{ asset('assets/backend/node_modules/morrisjs/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/node_modules/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/node_modules/select2/dist/css/select2.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/backend/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/backend/dist/css/style.min.css') }}" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>

<body class="skin-blue fixed-layout">
{{--<div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">Please wait</p>
    </div>
</div>--}}
<div id="main-wrapper">
    @include('Base::backend.top_bar')
    @include('Base::backend.left_sidebar')
    <div class="page-wrapper">
        <div class="container-fluid">
            <input type="text" class="success-notification d-none" value="{{ session('success') ?? null }}">
            <input type="text" class="danger-notification d-none" value="{{ session('danger') ?? null }}">
            @yield('content')
        </div>
    </div>
</div>
<script src="{{ asset("assets/backend/node_modules/jquery/jquery-3.2.1.min.js") }}"></script>
<script src="{{ asset("assets/backend/node_modules/popper/popper.min.js") }}"></script>
<script src="{{ asset("assets/backend/node_modules/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("assets/backend/dist/js/perfect-scrollbar.jquery.min.js") }}"></script>
<script src="{{ asset("assets/backend/dist/js/waves.js") }}"></script>
<script src="{{ asset("assets/backend/node_modules/select2/dist/js/select2.full.min.js") }}" type="text/javascript"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset("assets/backend/dist/js/sidebarmenu.js") }}"></script>
<script src="{{ asset("assets/backend/dist/js/custom.min.js") }}"></script>
<script src="{{ asset("assets/backend/node_modules/raphael/raphael-min.js") }}"></script>
<script src="{{ asset("assets/backend/node_modules/morrisjs/morris.min.js") }}"></script>
<script src="{{ asset("assets/backend/node_modules/jquery-sparkline/jquery.sparkline.min.js") }}"></script>
<script src="{{ asset("assets/backend/node_modules/toast-master/js/jquery.toast.js") }}"></script>
<script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
<script src="{{ asset("assets/jquery/main.js") }}"></script>
<script src="{{ asset("assets/jquery/modal.js") }}"></script>

<script !src="">
    $(document).ready(function () {
        $(".select2").select2();

        notificationAlert();
    })

</script>
@stack('js')
</body>

</html>
