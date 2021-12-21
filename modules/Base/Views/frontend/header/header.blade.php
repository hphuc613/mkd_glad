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
    <div class="container-fluid text-end py-2 px-5">
        <a href="#" class="cl-text-blue">註冊</a>
        <span class="px-2">|</span>
        <a href="#" class="cl-text-blue">登入</a>
    </div>
    <div class="header-group">
        <div class="d-flex justify-content-center">
            <div id="logo-search" class="logo-search logo-search-primary">
                <div class="position-relative">
                    <div id="logo" class="d-flex d-md-block d-lg-flex justify-content-center">
                        <a href="{{ route('get.home.index') }}"><img
                                src="{{ asset('storage/upload/Home/logo-primary.svg') }}" alt="Logo"></a>
                    </div>
                    <div id="search" class="search search-primary">
                        <form action="{{ route('get.product.productListing') }}" method="get">
                            <div class="input-group input-search">
                                <input type="text" name="key_search" placeholder="{{ trans('Search') }}"
                                       value="{{ request()->key_search ?? null }}">
                                <button type="submit" class="input-group-text">
                                    <img src="{{ asset('storage/upload/Home/search-blue.svg') }}"
                                         alt="{{ trans('Search') }}">
                                </button>
                            </div>
                        </form>
                        <div class="group-icon d-md-flex d-none">
                            @include('Base::frontend.header.user_icon')
                            @include('Base::frontend.header.cart_icon')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav id="nav" class="nav nav-primary navbar-expand-lg d-none d-lg-flex">
        @include('Base::frontend.header.menu')
    </nav>

    @include('Base::frontend.header.nav_scroll')
</header>
