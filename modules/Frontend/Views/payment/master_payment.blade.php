<html lang="{{ !empty(App::getLocale()) ? App::getLocale() : 'en' }}" xmlns:https="http://www.w3.org/1999/xhtml">
<head>
    <meta charset='utf-8'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/plugins/owl-carousel/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/owl-carousel/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/frontend/css/main.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

    <title>Glad Beauty</title>

    @stack('css')
</head>
<body>

<div class="main-wrap">
    <div id="payment" class="container payment">
        <div class="row row-payment">
            @yield('content')
            <div class="col-md-6 order-detail">
                <div class="product-list">
                    @foreach($cart['items'] as $item)
                        @php($item_product = $item['product'])
                        <div class="product-item">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 position-relative">
                                            <img src="{{ asset($item_product->image) }}"
                                                 alt="{{ asset($item_product->image) }}">
                                            <span class="quantity">{{ $item['quantity'] }}</span>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6>{{ $item_product->name }}</h6>
                                            <div class="text">{{ $item['capacity'] ?? NULL }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 d-flex align-items-center">
                                    <div class="price">{{ moneyFormat($item['final_price']) }}</div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <hr>
                <div class="discount py-3">
                    <div class="input-group">
                        <div class="form-floating w-75">
                            <input type="text" name="discount" id="discount" placeholder="Gift card or discount code"
                                   class="form-control">
                            <label for="district">Gift card or discount code</label>
                        </div>
                        <button class="btn btn-secondary w-25">Apply</button>
                    </div>
                </div>
                <hr>
                <div class="price-calculate py-3">
                    <div class="subtotal d-flex justify-content-between">
                        <div class="text">Subtotal</div>
                        <div class="price">{{ moneyFormat($cart['amount']) }}</div>
                    </div>
                    <div class="shipping d-flex justify-content-between">
                        <div class="text mb-0">Shipping <i class="fas fa-question-circle"></i></div>
                        <div class="price">{{ moneyFormat($shipping->value ?? 0) }}</div>
                    </div>
                </div>
                <hr>
                <div class="total-price py-4 d-flex justify-content-between">
                    <div class="text">Total</div>
                    <div class="price">{{ moneyFormat($cart['amount'] + (int)($shipping->value ?? 0)) }}</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 policy">
                <div class="text cl-text-primary">
                    By checking the sign-up box for text message offers and clicking Continue to shipping, I consent
                    to
                    receive recurring automated marketing text messages from GLADS BEAUTY WORKSHOP at the number
                    provided, and I agree that texts may be sent using through an autodialer or other technology.
                    Consent is not a condition of purchase. Text STOP to cancel, HELP for help. Message and Data
                    rates
                    may apply. For more information see [Terms of Service] & [Privacy Policy].
                </div>
                <div class="policy-link">
                    <a href="#">Refund policy</a>
                    <a href="#">Shipping policy</a>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
            <div class="col-md-6 d-none d-md-block order-detail"></div>
        </div>
    </div>
</div>

<a id="back-to-top" href="#" class="btn btn-light btn-lg back-to-top" role="button">
    <i class="fas fa-chevron-up"></i>
</a>
@include('Base::frontend.modal_group')
<script type="text/javascript" src="{{ asset('assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/pjax/jquery.pjax.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/owl-carousel/js/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/main.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/modal.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/frontend/js/cart.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/toast/toast.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/plugins/jsvalidation/js/jsvalidation.js')}}"></script>
@include('Base::frontend.flash_noti')

@stack('js')
</body>
</html>
