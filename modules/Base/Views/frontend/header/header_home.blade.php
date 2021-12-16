<header>
    <div id="noti" class="row cl-bg-primary container-fluid m-0 text-center noti">
        <div class="col-1"></div>
        <div class="col-10">
            <a class="text-white">劃一 HKD$35 送遞全港 - 14日信心退換保證</a>
        </div>
        <a href="javascript:" class="col-1 text-end text-white close">
            <i class="bi-x pe-2"></i>
        </a>
    </div>
    <!--Banner-->
    <div id="banner" class="header-group banner"
         style="background: url({{ asset('storage/upload/Home/banner.svg') }}) no-repeat center;background-size: cover;">
        <div class="d-flex justify-content-center">
            <div id="logo-search" class="logo-search">
                <div class="position-relative">
                    <div id="logo" class="d-flex d-md-block d-lg-flex justify-content-center">
                        <a href="{{ route('get.home.index') }}"><img src="{{ asset('storage/upload/Home/logo.svg') }}"
                                                                     alt="Logo"></a>
                    </div>
                    <nav id="nav" class="nav navbar-expand-lg justify-content-center py-5">
                        @include('Base::frontend.header.menu')
                    </nav>
                    <div id="search" class="search">
                        <form action="{{ route('get.product.productListing') }}" method="get">
                            <div class="input-group border border-2 border-white flex-nowrap">
                                <input type="text" name="key_search" placeholder="{{ trans('Search') }}"
                                       value="{{ request()->key_search ?? null }}">
                                <button type="submit" class="input-group-text">
                                    <img src="{{ asset('storage/upload/Home/search.svg') }}"
                                         alt="{{ trans('Search') }}}">
                                </button>
                            </div>
                        </form>
                        <div class="group-icon d-md-flex d-none">
                            @include('Base::frontend.header.user_icon')
                            <div class="position-relative">
                                <a href="{{ route('get.cart.cartBox') }}" id="cart-icon">
                                    <img src="{{ asset('storage/upload/Home/shopping_bag.svg') }}" alt="Icon bag">
                                    <div id="quantity" class="quantity">
                                        <p class="text-white">0</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="position-absolute bottom-0 w-100">
                <div id="title-banner" class="mt-auto px-5 text-center title-banner">
                    <p class="text-white mb-3 mx-auto">環保及天然有機護膚品護膚新體驗!</p>
                    <button class="btn btn-main btn-shop-now">
                        SHOP NOW
                    </button>
                </div>
            </div>
        </div>
    </div>

    @include('Base::frontend.header.nav_scroll')
</header>
