<nav id="nav-scroll" class="nav nav-scroll d-flex d-md-none">
    <nav class="navbar navbar-expand-lg navbar-dark w-100 d-flex justify-content-between">
        <a class="navbar-brand" href="{{ route('get.home.index') }}">
            <img src="{{ asset('storage/upload/Home/logo-primary.svg') }}" class="logo" alt="Logo">
        </a>
        <div class="d-flex">
            <div class="input-group d-flex d-md-none align-items-center me-2">
                @include('Base::frontend.header.user_icon')
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
            @include('Base::frontend.header.menu')
        </div>
    </nav>
</nav>
