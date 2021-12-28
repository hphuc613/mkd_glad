@extends('Frontend::payment.master_payment')
@php($auth = auth('web'))
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
                <li class="breadcrumb-item" aria-current="page">{{ trans('Information') }}</li>
                <li class="breadcrumb-item" aria-current="page">{{ trans('Shipping') }}</li>
                <li class="breadcrumb-item active" aria-current="page">{{ trans('Payment') }}</li>
            </ol>
        </nav>
        <div class="shipping-info table-responsive">
            <table class="table mb-0">
                <tr>
                    <td><label>{{ trans('Contact') }}</label></td>
                    <td>
                        <div class="text">{{ $data['email'] }}</div>
                    </td>
                    <td><a href="{{ route('get.payment.getPaymentInfo', $data) }}">{{ trans('Change') }}</a></td>
                </tr>
                <tr>
                    <td><label>{{ trans('Ship to') }}</label></td>
                    <td>{{ $data['address'] }}, {{ $data['district'] }}</td>
                    <td><a href="{{ route('get.payment.getPaymentInfo', $data) }}">{{ trans('Change') }}</a></td>
                </tr>
                <tr class="tr">
                    <td><label>{{ trans('Method') }}</label></td>
                    <td>【順豐站／智能櫃自取】請將順豐自取點填在Shipping Address, **於訂單確認後7-9個工作天內發貨. HK$35.00</td>
                    <td><a href="{{ route('get.payment.getPaymentShipping', $data) }}">{{ trans('Change') }}</a></td>
                </tr>
            </table>
        </div>
        <div class="payment-page">
            <div class="payment-method mb-5">
                <div class="label">
                    <h4>Payment</h4>
                    <div class="text cl-text-silver-5">All transactions are secure and encrypted.</div>
                </div>
                <div class="method-form">
                    <div class="card credit-cart">
                        <div class="card-header" data-bs-toggle="collapse" data-bs-target="#credit-cart"
                             aria-expanded="false" aria-controls="credit-cart">
                            <div>
                                <label class="checkmark-group">Credit Card
                                    <input type="radio" name="radio">
                                    <span class="checkmark checkmark-radio"></span>
                                </label>
                            </div>
                            <div>
                                <img src="../images/icon-visa.svg" width="34" alt="">
                                <img src="../images/icon-master-card.svg" width="34" alt="">
                            </div>
                        </div>
                        <div class="card-body collapse pb-0" id="credit-cart">
                            <form action="" class="form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" name="card_number" id="card-number"
                                                   placeholder="Card number"
                                                   class="form-control">
                                            <label for="card-number">Card number</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" name="card_name" id="card-name"
                                                   placeholder="Name on card"
                                                   class="form-control">
                                            <label for="card-name">Name on card</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" name="expiration_date" id="expiration-date"
                                                   placeholder="Expiration date (MM/YY)"
                                                   class="form-control">
                                            <label for="expiration-date">Expiration date (MM/YY)</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" name="security_code" id="security-code"
                                                   placeholder="Security code"
                                                   class="form-control">
                                            <label for="security-code">Security code</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card pay-pal">
                        <div class="card-header" data-bs-toggle="collapse" data-bs-target="#pay-pal"
                             aria-expanded="false" aria-controls="pay-pal">
                            <div>
                                <label class="checkmark-group">
                                    <img src="../images/ft_paypal.svg" alt="">
                                    <input type="radio" name="radio">
                                    <span class="checkmark checkmark-radio"></span>
                                </label>
                            </div>
                        </div>
                        <div class="card-body collapse pb-0" id="pay-pal">
                            <form action="" class="form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" name="card_number" id="card-number-pp"
                                                   placeholder="Card number"
                                                   class="form-control">
                                            <label for="card-number-pp">Card number</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" name="card_name" id="card-name-pp"
                                                   placeholder="Name on card"
                                                   class="form-control">
                                            <label for="card-name-pp">Name on card</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" name="expiration_date" id="expiration-date-pp"
                                                   placeholder="Expiration date (MM/YY)"
                                                   class="form-control">
                                            <label for="expiration-date-pp">Expiration date (MM/YY)</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" name="security_code" id="security-code-pp"
                                                   placeholder="Security code"
                                                   class="form-control">
                                            <label for="security-code-pp">Security code</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card pay-me">
                        <div class="card-header" data-bs-toggle="collapse" data-bs-target="#pay-me"
                             aria-expanded="false" aria-controls="pay-me">
                            <div>
                                <label class="checkmark-group">
                                    <img src="../images/ft-payme-logo.svg" alt="">
                                    <input type="radio" name="radio">
                                    <span class="checkmark checkmark-radio"></span>
                                </label>
                            </div>
                        </div>
                        <div class="card-body collapse pb-0" id="pay-me">
                            <form action="" class="form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" name="card_number" id="card-number-pm"
                                                   placeholder="Card number"
                                                   class="form-control">
                                            <label for="card-number-pm">Card number</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" name="card_name" id="card-name-pm"
                                                   placeholder="Name on card"
                                                   class="form-control">
                                            <label for="card-name-pm">Name on card</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" name="expiration_date" id="expiration-date-pm"
                                                   placeholder="Expiration date (MM/YY)"
                                                   class="form-control">
                                            <label for="expiration-date-pm">Expiration date (MM/YY)</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" name="security_code" id="security-code-pm"
                                                   placeholder="Security code"
                                                   class="form-control">
                                            <label for="security-code-pm">Security code</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card fps">
                        <div class="card-header" data-bs-toggle="collapse" data-bs-target="#fps"
                             aria-expanded="false" aria-controls="fps">
                            <div>
                                <label class="checkmark-group">
                                    <img src="../images/ft_fps.svg" alt="">
                                    <input type="radio" name="radio">
                                    <span class="checkmark checkmark-radio"></span>
                                </label>
                            </div>
                        </div>
                        <div class="card-body collapse pb-0" id="fps">
                            <form action="" class="form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" name="card_number" id="card-number-fps"
                                                   placeholder="Card number"
                                                   class="form-control">
                                            <label for="card-number-fps">Card number</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" name="card_name" id="card-name-fps"
                                                   placeholder="Name on card"
                                                   class="form-control">
                                            <label for="card-name-fps">Name on card</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" name="expiration_date" id="expiration-date-fps"
                                                   placeholder="Expiration date (MM/YY)"
                                                   class="form-control">
                                            <label for="expiration-date-fps">Expiration date (MM/YY)</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" name="security_code" id="security-code-fps"
                                                   placeholder="Security code"
                                                   class="form-control">
                                            <label for="security-code-fps">Security code</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card bank-transfer">
                        <div class="card-header" data-bs-toggle="collapse" data-bs-target="#bank-transfer"
                             aria-expanded="false" aria-controls="bank-transfer">
                            <div>
                                <label class="checkmark-group">
                                    銀行轉帳 Bank Transfer
                                    <input type="radio" name="radio">
                                    <span class="checkmark checkmark-radio"></span>
                                </label>
                            </div>
                        </div>
                        <div class="card-body collapse pb-0" id="bank-transfer">
                            <form action="" class="form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" name="card_number" id="card-number-bt"
                                                   placeholder="Card number"
                                                   class="form-control">
                                            <label for="card-number-bt">Card number</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" name="card_name" id="card-name-bt"
                                                   placeholder="Name on card"
                                                   class="form-control">
                                            <label for="card-name-bt">Name on card</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" name="expiration_date" id="expiration-date-bt"
                                                   placeholder="Expiration date (MM/YY)"
                                                   class="form-control">
                                            <label for="expiration-date-bt">Expiration date (MM/YY)</label>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-floating">
                                            <input type="text" name="security_code" id="security-code-bt"
                                                   placeholder="Security code"
                                                   class="form-control">
                                            <label for="security-code-bt">Security code</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="billing-address mb-5">
                <div class="label">
                    <h4>Billing address</h4>
                    <div class="text cl-text-silver-5">Select the address that matches your card or payment
                        method.
                    </div>
                </div>
                <table class="table border rounded table-responsive mb-0">
                    <tr class="tr">
                        <td>
                            <label class="checkmark-group">
                                Same as shipping address
                                <input type="radio" name="radio">
                                <span class="checkmark checkmark-radio"></span>
                            </label>
                        </td>
                    </tr>
                    <tr class="tr">
                        <td>
                            <label class="checkmark-group">
                                Use a different billing address
                                <input type="radio" name="radio">
                                <span class="checkmark checkmark-radio"></span>
                            </label>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="remember-me mb-4">
                <div class="label">
                    <h4>Remember me</h4>
                    <div class="text cl-text-silver-5">Select the address that matches your card or payment
                        method.
                    </div>
                </div>
                <table class="table border rounded table-responsive mb-0">
                    <tr class="tr">
                        <td class="ps-3">
                            <label class="checkmark-group">
                                Save my information for a faster checkout
                                <input type="checkbox" name="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="group-btn">
            <a href="payment.html" class="btn btn-dark text-light me-2">Pay now</a>
            <a href="payment-shipping.html" class="btn cl-text-primary">Return to shipping</a>
        </div>
        <hr>
    </div>
@endsection
@push('js')

@endpush
