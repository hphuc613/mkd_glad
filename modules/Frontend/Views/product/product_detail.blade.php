@extends("Base::frontend.master")

@section("content")
    <div class="pt-3">
        <section id="product-detail" class="product-detail">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{asset($data->image ?? '')}}" width="100%" alt="{{$data->image ?? ''}}">
                    </div>
                    <div class="col-md-6">
                        <div class="content">
                            <h4 class="cl-text-blue text-uppercase mb-3">{{$data->name ?? ''}}</h4>
                            <h4 class="fw-bold mb-0">${{$data->price ?? ''}}</h4>
                            <div class="vote-star">
                                {!! getStar($data->vote) !!}
                                <span>{{count($data->feedback)}} reviews</span>
                            </div>
                            <div class="description text mb-5">
                                {{$data->description ?? ''}}
                            </div>
                            <div class="content">
                                <?= $data->content ?? '' ?>
                            </div>
                            <div class="capacity mb-3">
                                {!! Form::select('capacity[]', $capacities, $capacities, [
                                    'id' => 'capacity',
                                    'name' => 'capacity',
                                    'class' => 'select2 form-control capacity']) !!}
                            </div>
                            <button class="btn btn-sub-blue btn-add-to-card">ADD TO CART</button>
                        </div>
                        <div class="feature">
                            <div class="feature-item d-flex align-items-center">
                                <img src="{{ asset('storage/upload/Home/lotion-product-detail.svg') }}"
                                     alt="{{ asset('storage/upload/Home/lotion-product-detail.svg') }}">
                                <div class="text">適合乾性、混合性及敏感性皮膚</div>
                            </div>
                            <div class="feature-item d-flex align-items-center">
                                <img src="{{ asset('storage/upload/Home/skin-product-detail.svg') }}"
                                     alt="{{ asset('storage/upload/Home/skin.svg') }}">
                                <div class="text">以潔淨成份作護膚標準</div>
                            </div>
                            <div class="feature-item d-flex align-items-center">
                                <img src="{{ asset('storage/upload/Home/rating-product-detail.svg') }}"
                                     alt="{{ asset('storage/upload/Home/rating-product-detail.svg') }}">
                                <div class="text">超過5000位客戶滿意使用效果並回購產品</div>
                            </div>
                            <div class="feature-item d-flex align-items-center">
                                <img src="{{ asset('storage/upload/Home/ship-product-detail.svg') }}"
                                     alt="{{ asset('storage/upload/Home/ship-product-detail.svg') }}">
                                <div class="text">14天內簡易退換貨程序</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="description-box mb-5">
                <div class="description-tab">
                    <ul class="nav nav-pills mb-3" id="description-tab" role="tablist">
                        <li class="nav-item">
                            <a href="#what-is-it" data-bs-toggle="pill" class="nav-link active">
                                {{ trans('What is it?') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#benefit" data-bs-toggle="pill" class="nav-link">
                                {{ trans('Benefit') }}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#ingredients" data-bs-toggle="pill" class="nav-link">
                                {{ trans('Ingredients') }}
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="what-is-it" role="tabpanel">
                            {!! $data->what_is_it !!}
                        </div>
                        <div class="tab-pane fade" id="benefit" role="tabpanel">
                            {!! $data->benefit !!}
                        </div>
                        <div class="tab-pane fade" id="ingredients" role="tabpanel">
                            {!! $data->ingredients !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="container product-maybe-like product-list text-center">
                <div class="title p-4">
                    <h3 class="cl-text-blue fw-bold">{{trans('你可能會喜歡')}}</h3>
                </div>
                <div class="row">
                    @foreach($product_relate as $product)
                        <div class="col-md-3">
                            <div class="product-item">
                                <a href="{{route('get.product.productDetail',$product->key_slug)}}">
                                    <img src="{{asset($product->image ?? '')}}" class="mb-3"
                                         alt="{{ $product->image }}">
                                </a>
                                <div class="content text-md-center mb-3">
                                    <a href="{{route('get.product.productDetail',$product->key_slug)}}" class="title">
                                        {{$product->name ?? ''}}
                                    </a>
                                    <div class="product-price">from <span
                                            class="price">${{ moneyFormat($product->price, false) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @include('Frontend::product.feedback')
        </section>
        <div class="container">
            <hr>
        </div>
        <section id="offer-month-bundle" class="offer-month pt-5">
            <div class="container mb-5 title">
                <h3 class="cl-text-blue">最近瀏覽過的產品</h3>
            </div>
            <div class="container product-recently-see text-center py-5 mb-5">
                <div class="product-list row">
                    @foreach($product_recentlies as $product)
                        @continue($product->id == $data->id)
                        <div class="col-md-3">
                            <div class="product-item">
                                <a href="{{route('get.product.productDetail',$product->key_slug)}}">
                                    <img src="{{ asset($product->image) }}" class="mb-3" alt="{{$product->image}}">
                                </a>
                                <div class="content text-md-center mb-3">
                                    <a href="{{route('get.product.productDetail',$product->key_slug)}}" class="title">
                                        {{$product->name}}
                                    </a>
                                    <div class="product-price">
                                        from <span class="price">${{moneyFormat($product->price, false)}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="return-product-text">
                <div class="container">
                    <div class="d-flex">
                        <img src="{{ asset('storage/upload/Home/offer-month-bundle-return-product.svg') }}" width="155"
                             alt="">
                        <div class="text">如果您不滿意或遇到敏感問題，可於14天內寄回給我們。</div>
                    </div>
                </div>
            </div>
            <div class="register-email">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h1>想獲取更多資訊? 立即註冊</h1>
                            <div class="text cl-text-blue">註冊加入我們，以獲取最新消息、新產品發佈及優惠詳情</div>
                        </div>
                        <div class="col-md-6">
                            <form action="#">
                                <div class="form-group">
                                    <input type="text" class="form-control border-0 rounded-0" placeholder="輸入你的電郵地址">
                                </div>
                                <div class="py-2">
                                    <button
                                        class="btn btn-light border-0 rounded-0 w-100 fw-bold">{{trans('Send')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
