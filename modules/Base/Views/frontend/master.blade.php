@php
    use App\AppHelpers\Helper;
    $logo = Helper::getSetting('LOGO_NORMAL');
    $favicon = Helper::getSetting('FAVICON');
    $website_name = Helper::getSetting('WEBSITE_NAME');
@endphp
<html lang="{{ !empty(App::getLocale()) ? App::getLocale() : 'en' }}">
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/plugins/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/owl-carousel/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datetimepicker/css/datetimepicker-custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="icon" href="{{ url(asset( !empty($favicon) ? $favicon :'storage/upload/Home/products.png')) }}">
    <title>{{!empty($website_name) ? $website_name : 'Glad Beauty'}}</title>

    @stack('css')
</head>
<body>
@include('Base::frontend.header.header')
<div class="main-wrap">
    @yield('content')
</div>
@include('Base::frontend.modal_group')

@include('Base::frontend.footer')

<!-- Modal Point -->
<div id="title-reward" class="title-reward">
    <a href="{{ route('get.home.pointReward') }}" data-bs-toggle="modal" data-bs-target="#form-modal">
        {{trans('會員積分獎賞')}}
    </a>
</div>

<!-- Whats App -->
<div id="whatsapp" class="whatsapp">
    <a href="#">
        <img src="{{ asset('storage/upload/Home/whats_app.svg') }}" alt="whatsapp">
    </a>
</div>

<!-- Back to top -->
<a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button">
    <i class="fas fa-chevron-up"></i>
</a>

<script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/pjax/jquery.pjax.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/owl-carousel/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datetimepicker/js/datetimepicker.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datetimepicker/js/locales/bootstrap-datetimepicker.zh-TW.js') }}"></script>
<script src="{{ asset('assets/plugins/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/modal.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/cart.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/toast/toast.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/jsvalidation/js/jsvalidation.js')}}"></script>
@include('Base::frontend.flash_noti')

@stack('js')
<script>
    $(document).ready(function () {
        addToCart('{{ route('get.cart.addToCart') }}');
    });
</script>
</body>
</html>
