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
                        <ul class="navbar-nav">
                            <li class="nav-item list-unstyled dropdown">
                                <a href="javascript:" class="nav-link" id="nav-about-us">關於我們</a>
                                <ul class="dropdown-menu border-0 shadow-036 rounded-0 nav-item-dropdown"
                                    aria-labelledby="nav-about-us">
                                    <li class="dropdown-item"><a href="{{route('get.page.aboutUs')}}">關於我們</a></li>
                                    <li class="dropdown-item"><a href="{{route('get.page.ourMission')}}">我們的使命</a></li>
                                    <li class="dropdown-item"><a href="{{route('get.page.participate')}}">過往參與攤位</a></li>
                                </ul>
                            </li>
                            <li class="nav-item list-unstyled"><a href="offer-month.html" class="nav-link">本⽉優惠</a></li>
                            <li class="nav-item list-unstyled"><a href="#" class="nav-link">最新消息</a></li>
                            <li class="nav-item list-unstyled dropdown">
                                <a href="all-item.html" class="nav-link" id="nav-scroll-item-dropdown-product">所有產品</a>
                                <ul class="dropdown-menu border-0 shadow-036 rounded-0 nav-item-dropdown"
                                    aria-labelledby="nav-scroll-item-dropdown-product">
                                    <li class="dropdown-item"><a href="#">護療霜</a></li>
                                    <li class="dropdown-item"><a href="#">萬用膏</a></li>
                                    <li class="dropdown-item"><a href="#">潤手霜 </a></li>
                                    <li class="dropdown-item"><a href="#">乳液 </a></li>
                                    <li class="dropdown-item"><a href="#">面霜 </a></li>
                                </ul>
                            </li>
                            <li class="nav-item list-unstyled"><a href="{{route('get.page.contactUs')}}"
                                                                  class="nav-link">聯絡我們</a></li>
                        </ul>
                    </nav>
                    <div id="search" class="search">
                        <div class="input-group border border-2 border-white flex-nowrap">
                            <input type="text" name="search" placeholder="Search">
                            <span class="input-group-text"><img src="{{ asset('storage/upload/Home/search.svg') }}"
                                                                alt="Search"></span>
                        </div>
                        <div class="group-icon d-md-flex d-none">
                            @if(!auth('web')->check())
                                <a href="{{ route('get.home.login') }}" data-bs-toggle="modal"
                                   data-bs-target="#form-modal"
                                   class="me-2">
                                    <img src="{{ asset('storage/upload/Home/user.svg') }}" alt="Icon user">
                                </a>
                            @else
                                <div class="dropdown user-dropdown">
                                    <a href="javascript:" id="user-dropdown-content" class="me-2"data-bs-toggle="dropdown"
                                       aria-expanded="false">
                                        <img src="{{ asset('storage/upload/Home/user.svg') }}" alt="Icon user">
                                    </a>
                                    <ul class="dropdown-menu border-0 shadow-036 rounded-0" aria-labelledby="user-dropdown-content">
                                        <li class="dropdown-item"><a href="{{ route('get.home.logout') }}">Logout</a></li>
                                    </ul>
                                </div>
                            @endif
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

    @include('Base::frontend.nav_scroll')
</header>
