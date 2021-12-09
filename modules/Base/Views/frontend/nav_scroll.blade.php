<nav id="nav-scroll" class="nav nav-scroll d-flex d-md-none">
    <nav class="navbar navbar-expand-lg navbar-dark w-100 d-flex justify-content-between">
        <a class="navbar-brand" href="{{ route('get.home.index') }}">
            <img src="{{ asset('storage/upload/Home/logo-primary.svg') }}" class="logo" alt="Logo">
        </a>
        <div class="d-flex">
            <div class="input-group d-flex d-md-none align-items-center me-2">
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
                    <a href="{{ route('get.cart.cartBox') }}" id="cart-icon-mobile">
                        <img src="{{ asset('storage/upload/Home/shopping_bag.svg') }}" alt="Icon bag">
                        <div id="quantity" class="quantity">
                            <p class="text-white">0</p>
                        </div>
                    </a>
                </div>
            </div>
            <button class="navbar-toggler" id="navbar-scroll-btn" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbar-scroll-content" aria-controls="navbar-scroll-content"
                    aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list"></i>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end px-5 pb-5 pb-sm-0" id="navbar-scroll-content">
            <ul class="navbar-nav">
                <li class="nav-item list-unstyled dropdown">
                    <a href="javascript:" class="nav-link" id="nav-scroll-about-us">關於我們</a>
                    <ul class="dropdown-menu border-0 shadow-036 rounded-0 nav-item-dropdown"
                        aria-labelledby="nav-scroll-about-us">
                        <li class="dropdown-item"><a href="{{route('get.page.aboutUs')}}">關於我們</a></li>
                        <li class="dropdown-item"><a href="{{route('get.page.ourMission')}}">我們的使命</a></li>
                        <li class="dropdown-item"><a href="about-us-participating.html">過往參與攤位</a></li>
                    </ul>
                </li>
                <li class="nav-item list-unstyled"><a href="offer-month.html" class="nav-link">本⽉優惠</a></li>
                <li class="nav-item list-unstyled"><a href="#" class="nav-link">最新消息</a></li>
                <li class="nav-item list-unstyled dropdown">
                    <a href="all-item.html" class="nav-link" id="nav-scroll-dropdown-product">所有產品</a>
                    <ul class="dropdown-menu border-0 shadow-036 rounded-0 nav-item-dropdown"
                        aria-labelledby="nav-scroll-item-dropdown-product">
                        <li class="dropdown-item"><a href="#">護療霜</a></li>
                        <li class="dropdown-item"><a href="#">萬用膏</a></li>
                        <li class="dropdown-item"><a href="#">潤手霜 </a></li>
                        <li class="dropdown-item"><a href="#">乳液 </a></li>
                        <li class="dropdown-item"><a href="#">面霜 </a></li>
                    </ul>
                </li>
                <li class="nav-item list-unstyled"><a href="{{route('get.page.contactUs')}}" class="nav-link">聯絡我們</a></li>
            </ul>
        </div>
    </nav>
</nav>
