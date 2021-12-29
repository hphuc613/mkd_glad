<footer>
    <div class="row">
        <div class="col-md-7">
            <div class="row">
                <div class="col-6">
                    <ul class="list-unstyled">
                        <li class="title-footer"><a href="#">{{trans('資訊')}}</a></li>
                        <li><a href="#">{{trans('會員計劃')}}</a></li>
                        <li><a href="#">{{trans('免責條款')}}</a></li>
                        <li><a href="#">{{trans('私隱政策')}}</a></li>
                        <li><a href="#">{{trans('優惠條款')}}</a></li>
                    </ul>
                </div>
                <div class="col-6">
                    <ul class="list-unstyled">
                        <li class="title-footer"><a href="#">{{trans('資訊')}}</a></li>
                        <li><a href="{{ route('get.page.shippingInformation') }}">{{trans('寄送資訊')}}</a></li>
                        <li><a href="{{ route('get.page.orderTeaching') }}">{{trans('下單教學')}}</a></li>
                        <li><a href="{{route('get.page.commonProblem')}}">{{trans('常見問題')}}</a></li>
                        <li><a href="{{route('get.page.contactUs')}}">{{trans('聯絡我們')}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="d-flex mb-5">
                <div>
                    <h4 class="title-footer">{{trans('追蹤我們')}}</h4>
                    <a href="#" class="me-4"><img class="mb-2 mb-md-0" alt="Facebook"
                                                  src="{{ asset('storage/upload/Home/ft_facebook.svg') }}"></a>
                    <a href="#"><img alt="Instagram" src="{{ asset('storage/upload/Home/ft_instagram.svg') }}"></a>
                </div>
                <a><img class="footer-logo" alt="Logo" src="{{ asset('storage/upload/Home/logo-circle.svg') }}"></a>
            </div>
            <div class="footer-brand">
                <a><img alt="Apple Pay" src="{{ asset('storage/upload/Home/ft_apple_pay.svg') }}"></a>
                <a><img alt="Google Pay" src="{{ asset('storage/upload/Home/ft_google_pay.svg') }}"></a>
                <a><img alt="Master card" src="{{ asset('storage/upload/Home/ft_master_card.svg') }}"></a>
                <a><img alt="Stripe" src="{{ asset('storage/upload/Home/ft_stripe.svg') }}"></a>
                <a><img alt="Visa" src="{{ asset('storage/upload/Home/ft_visa.svg') }}"></a>
                <a><img alt="Paypal" src="{{ asset('storage/upload/Home/ft_paypal.svg') }}"></a>
            </div>

        </div>
    </div>
</footer>
