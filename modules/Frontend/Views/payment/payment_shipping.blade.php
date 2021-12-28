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
                <li class="breadcrumb-item active" aria-current="page">{{ trans('Shipping') }}</li>
                <li class="breadcrumb-item" aria-current="page">{{ trans('Payment') }}</li>
            </ol>
        </nav>

        <form action="{{ route('get.payment.getPaymentNow') }}" method="get" class="form">
            <div class="shipping-info table-responsive">
                <table class="table mb-0">
                    <tbody>
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
                    </tbody>
                </table>
            </div>
            <div class="shipping-method">
                <div class="label">
                    <h4>Shipping method</h4>
                </div>
                <table class="table table-responsive">
                    <tr class="tr">
                        <td>
                            <label class="checkmark-group">
                                <input type="radio" name="shipping" id="1" value="1">
                                <span class="checkmark checkmark-radio"></span>
                            </label>
                        </td>
                        <td><label for="1">【7-11/OK自取/工商地址】請將服務點號填至Shipping Address, **於訂單確認後7-9個工作天內發貨</label></td>
                        <td>
                            <div class="price">HK$35.00</div>
                        </td>
                    </tr>
                    <tr class="tr">
                        <td>
                            <label class="checkmark-group">
                                <input type="radio" name="shipping" id="2" value="2">
                                <span class="checkmark checkmark-radio"></span>
                            </label>
                        </td>
                        <td><label for="2">【住宅地址】**於訂單確認後7-9個工作天內發貨</label></td>
                        <td>
                            <div class="price">HK$35.00</div>
                        </td>
                    </tr>
                    <tr class="tr">
                        <td>
                            <label class="checkmark-group">
                                <input type="radio" name="shipping" id="3" value="3" checked>
                                <span class="checkmark checkmark-radio"></span>
                            </label>
                        </td>
                        <td><label for="3">【順豐站／智能櫃自取】請將順豐自取點填在Shipping Address, **於訂單確認後7-9個工作天內發貨</label></td>
                        <td>
                            <div class="price">HK$35.00</div>
                        </td>
                    </tr>
                </table>
                <div class="group-btn">
                    <input type="hidden" name="data" value="{{ json_encode($data) }}">
                    <button type="submit" class="btn btn-dark text-light me-2">{{ trans('Continue to payment') }}</button>
                    <a href="{{ route('get.payment.getPaymentInfo', $data) }}" class="btn cl-text-primary">{{ trans('Return to information') }}</a>
                </div>
            </div>
        </form>
        <hr>
    </div>
@endsection
@push('js')

@endpush
