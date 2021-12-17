<ul class="navbar-nav">
    <li class="nav-item list-unstyled dropdown">
        <a href="javascript:" class="nav-link" id="nav-item-about-us">關於我們</a>
        <ul class="dropdown-menu border-0 shadow-036 rounded-0 nav-item-dropdown"
            aria-labelledby="nav-item-about-us">
            <li class="dropdown-item"><a href="{{route('get.page.aboutUs')}}">關於我們</a></li>
            <li class="dropdown-item"><a href="{{route('get.page.ourMission')}}">我們的使命</a></li>
            <li class="dropdown-item"><a href="{{route('get.page.participate')}}">過往參與攤位</a></li>
        </ul>
    </li>
    <li class="nav-item list-unstyled"><a href="offer-month.html" class="nav-link">本⽉優惠</a></li>
    <li class="nav-item list-unstyled"><a href="#" class="nav-link">最新消息</a></li>
    <li class="nav-item list-unstyled dropdown">
        <a href="{{ route('get.product.productListing', [ 'cate' => null ]) }}" class="nav-link" id="nav-item-dropdown-product">所有產品</a>
        <ul class="dropdown-menu border-0 shadow-036 rounded-0 nav-item-dropdown"
            aria-labelledby="nav-item-dropdown-product">
            @php($product_cates = \Modules\Product\Models\ProductCategory::query()->where('status', \Modules\Base\Models\Status::STATUS_ACTIVE)->get())
            @foreach($product_cates as $cate)
                <li class="dropdown-item"><a href="{{ route('get.product.productListing', [ 'cate' => $cate->key_slug]) }}">{{ $cate->name }}</a></li>
            @endforeach
            <li class="dropdown-item"><a href="{{ route('get.product.productListing', [ 'cate' => "best-seller"]) }}">{{ trans('Best Seller') }}</a></li>
        </ul>
    </li>
    <li class="nav-item list-unstyled"><a href="{{route('get.page.contactUs')}}" class="nav-link">聯絡我們</a></li>
</ul>
