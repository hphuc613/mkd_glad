@extends('Frontend::payment.master_payment')
@php($auth = auth('web'))
@php($request = request())
@section('content')
    <div class="col-md-6 payment-info">
        <div class="header-payment">
            <div id="logo">
                <a href="{{ route('get.home.index') }}"><img
                        src="{{ asset('storage/upload/Home/logo-black.svg') }}" alt="Logo"></a>
            </div>
        </div>
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">{{ trans('Cart') }}</li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans('Information') }}</li>
                <li class="breadcrumb-item" aria-current="page">{{ trans('Shipping') }}</li>
                <li class="breadcrumb-item" aria-current="page">{{ trans('Payment') }}</li>
            </ol>
        </nav>
        <div class="express-checkout">
            <h5 class="title">{{ trans('Express Checkout') }}</h5>
            <div class="payment-method row">
                <div class="col-md-4">
                    <button class="btn btn-dark">
                        G Pay
                    </button>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-warning">
                        G Pay
                    </button>
                </div>
                <div class="col-md-4">
                    <button class="btn btn-purple">
                        G Pay
                    </button>
                </div>
            </div>
        </div>
        <div class="w-100 or border-bottom text-center">
                  <span class="px-2 bg-light">
                    {{ trans('OR') }}
                  </span>
        </div>
        <div class="contact-info-form">
            <form action="{{ route('get.payment.getPaymentShipping') }}" class="form" method="get" id="payment-info-form">
                <div class="contact-info">
                    <div class="label">
                        <h4>{{ trans('Contact infomation') }}</h4>
                        @if(!$auth->check())
                            <div>{{ trans('Already have an account?') }}
                                <a href="{{ route('get.home.login') }}" data-bs-toggle="modal"
                                   data-bs-target="#form-modal">{{ trans('Log in') }}</a>
                            </div>
                        @endif
                    </div>
                    <div class="form-floating">
                        <input type="email" name="email" id="email" placeholder="{{ trans('Email') }}"
                               class="form-control" value="{{ $auth->user()->email ?? NULL }}">
                        <label for="email">{{ trans('Email') }}</label>
                    </div>
                    <div class="form-group text-start">
                        <label
                            class="checkmark-group">{{ trans('Sign up for exclusive offers and news via text messages & email.') }}
                            <input type="checkbox" id="check-register-email" class="me-2">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div class="shipping-address">
                    <div class="label">
                        <h4>{{ trans('Shipping address') }}</h4>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" name="name" id="first-name" placeholder="First name"
                                       class="form-control" value="{{ $request->name ?? $auth->user()->name ?? NULL }}">
                                <label for="first-name">{{ trans('First name') }}</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <input type="text" name="last_name" id="last-name" placeholder="Last name"
                                       class="form-control" value="{{ $request->last_name ?? $auth->user()->last_name ?? NULL }}">
                                <label for="last-name">{{ trans('Last name') }}</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" name="company" id="company" placeholder="Company (optional)"
                                       class="form-control" value="{{ $request->company ?? $auth->user()->company ?? NULL }}">
                                <label for="company">{{ trans('Company (optional)') }}</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" name="address" id="address" placeholder="Address"
                                       class="form-control" value="{{ $request->address ?? $auth->user()->address ?? NULL }}">
                                <label for="address">{{ trans('Address') }}</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" name="apartment" id="apartment"
                                       placeholder="{{ trans('Apartment, suite, etc.') }}"
                                       class="form-control" value="{{ $request->apartment ?? NULL }}">
                                <label for="apartment">{{ trans('Apartment, suite, etc.') }}</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" name="district" id="district"
                                       placeholder="{{ trans('District') }}"
                                       class="form-control" value="{{ $request->district ?? NULL }}">
                                <label for="district">{{ trans('District') }}</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <select name="country" class="form-select" id="country"
                                        aria-label="Floating label select">
                                    <option value="1">Hong Kong SAR</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="country" class="label-select">Country/Region</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-floating">
                                <select name="region" class="form-select" id="region">
                                    <option value="1">Kowloon</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                <label for="country" class="label-select">Region</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating phone-input">
                                <input type="text" name="phone" id="phone"
                                       placeholder="{{ trans('Phone number for updates and exclusive offers') }}"
                                       class="form-control phone" value="{{ $request->phone ?? $auth->user()->phone ?? NULL }}">
                                <label
                                    for="district">{{ trans('Phone number for updates and exclusive offers') }}</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="group-btn">
                                <button class="btn btn-dark text-light me-2" type="submit">
                                    {{ trans('Continue to shipping') }}
                                </button>
                                <a href="{{ route('get.cart.shoppingCart') }}"
                                   class="btn cl-text-primary">{{ trans('Return to cart') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <hr>
    </div>
@endsection
@push('js')
    {!! JsValidator::formRequest('Modules\Frontend\Requests\Payment\PaymentInfoRequest','#payment-info-form') !!}
@endpush
