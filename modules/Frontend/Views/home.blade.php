@extends("Base::frontend.home.master")

@section("content")
    <div id="home">
        <section id="product-popular" class="container product-popular py-5">
            <div class="row">
                <div class="col-sm-8 col-md-5 col-lg-3 mb-2">
                    <div class="card border-0">
                        <img src="{{ asset('storage/upload/Home/home_calendula_cream.svg') }}" alt="">
                        <div class="card-img-overlay d-flex align-items-end">
                            <div class="w-100 text-center">
                                <h3 class="text-white">金盞花修護乳霜</h3>
                                <button class="btn btn-main btn-product">
                                    SHOP NOW
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-md-5 col-lg-3 mb-2">
                    <div class="card border-0">
                        <img src="{{ asset('storage/upload/Home/home_magnificent_cream.svg') }}" alt="">
                        <div class="card-img-overlay d-flex align-items-end">
                            <div class="w-100 text-center">
                                <h3 class="text-white">瑰麗亮肌煥彩護療霜</h3>
                                <button class="btn btn-main btn-product">
                                    SHOP NOW
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-md-5 col-lg-3 mb-2">
                    <div class="card border-0">
                        <img src="{{ asset('storage/upload/Home/home_lavender_oil.svg') }}" alt="">
                        <div class="card-img-overlay d-flex align-items-end">
                            <div class="w-100 text-center">
                                <h3 class="text-white">薰衣草萬用膏</h3>
                                <button class="btn btn-main btn-product">
                                    SHOP NOW
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-md-5 col-lg-3 mb-2">
                    <div class="card border-0">
                        <img src="{{ asset('storage/upload/Home/home_primrose _cream.svg') }}" alt="">
                        <div class="card-img-overlay d-flex align-items-end">
                            <div class="w-100 text-center">
                                <h3 class="text-white">月見草舒敏乳霜</h3>
                                <button class="btn btn-main btn-product">
                                    SHOP NOW
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="our-story" class="our-story">
            <div class="natural">
                <div class="story-left card border-0"
                     style="background-image: url('{{ asset('storage/upload/Home/home_natural.svg') }}')">
                    <div class="card-img-overlay d-flex align-items-center">
                        <div class="w-100 text-center">
                            <h1 class="text-white title-story">NATURAL, ORGANIC, HARMLESS !</h1>
                            <h1 class="text-white title-description text-center">天然有機護膚品帶來護膚新體驗！</h1>
                        </div>
                    </div>
                </div>
                <div id="story-right" class="story-right cl-bg-primary text-center">
                    <h1 class="cl-text-blue title-story">NATURAL, ORGANIC, HARMLESS !</h1>
                    <h6 class="text-white title-description">堅持嚴選原材料是本店宗旨,堅持才能帶來希望所以,敬請現正飽受皮膚問題困擾您,不要
                        灰心,快來敝店攤擋跟我們交流,我們已準備好試用裝,只要大家有需要便可免費索取。</h6>
                    <div id="img-natural" class="text-center img-natural">
                        <div class="row">
                            <div class="col-lg-6 col-xl-4">
                                <img src="{{ asset('storage/upload/Home/home_lotion.svg') }}" class="card-img-top"
                                     alt="{{ asset('storage/upload/Home/home_lotion.svg') }}">
                                <div class="card-body d-flex align-items-end text-center justify-content-center">
                                    <p class="text-white card-text">優質潔淨成分安全高效配方</p>
                                </div>
                            </div>

                            <div class="col-lg-6 col-xl-4">
                                <img src="{{ asset('storage/upload/Home/home_wallet.svg') }}" class="card-img-top"
                                     alt="{{ asset('storage/upload/Home/home_wallet.svg') }}">
                                <div class="card-body d-flex align-items-end justify-content-center">
                                    <p class="text-white card-text">櫃位領件 (免郵費)寄出或面交</p>
                                </div>
                            </div>

                            <div class="col-lg-6 col-xl-4">
                                <img src="{{ asset('storage/upload/Home/home_rating.svg') }}" class="card-img-top"
                                     alt="{{ asset('storage/upload/Home/home_rating.svg') }}">
                                <div class="card-body d-flex align-items-end justify-content-center">
                                    <p class="text-white card-text">大量真實用家分享敏感肌適用</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="story" class="story container">
                    <div class="text-center cl-bg-secondary story-content">
                        <h1 class="cl-text-blue title-story">OUR STORY</h1>
                        <p class="text-white intent px-3">本品牌宗旨誓要致力推廣環保及天然有機護膚品對地球環境生態以及對我
                            們肌膚健康的好處！本品牌宗旨誓要致力推廣環保及天然有機護膚品對地
                            球環境生態以及對我們肌膚健康的好處！本品牌宗旨誓要致力推廣環保及
                            天然有機護膚品對地球環境生態以及對我們肌膚健康的好處！本品牌宗旨
                            誓要致力推廣環保及天然有機護膚品對地球環境生態以及對我們肌膚健康
                            的好處！本品牌宗旨誓要致力推廣環保及天然有機護膚品對地球環境生態
                            以及對我們肌膚健康的好處！本品牌宗旨誓要致力推廣環保及天然有機護
                            膚品對地球環境生態以及對我們肌膚健康的好處！本品牌宗旨誓要致力推
                            廣環保及天然有機護膚品對地球環境生態以及對我們肌膚健康的好處！本
                            品牌宗旨誓要致力推廣環保及天然有機護膚品對地球環境生態</p>
                        <img class="w-100" src="{{ asset('storage/upload/Home/home_story.svg') }}" alt="story">
                        <button class="btn btn-main btn-learn-more">
                            LEARN MORE
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <section id="popular" class="text-center popular">
            <h1 class="popular-title cl-text-blue">POPULAR CHOICES</h1>
            <div class="container-fluid">
                <div class="row">
                    @foreach($popular_products as $product)
                        <div class="col-lg-6 col-xl-4 card-product">
                            <a href="{{route('get.product.productDetail',$product->key_slug)}}"><img src="{{ $product->image }}" alt="natural"></a>
                            <div class="product-title">
                                <a href="{{route('get.product.productDetail',$product->key_slug)}}" class="cl-text-primary text-uppercase">
                                    {!! $product->name  !!}
                                </a>
                            </div>
                            <div class="description text-start">
                                {!! $product->content !!}
                            </div>
                            <div class="price">${{ moneyFormat($product->price, false) }}</div>
                            <button class="btn btn-outline-main-light btn-add-to-card">ADD TO CART</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section id="discover" class="text-center discover">
            <h1 class="text-center text-white cl-bg-primary title-discover">
                DISCOVER MORE
            </h1>
            <div class="container-fluid">
                <div class="row discover-row">
                    @foreach($discover_products as $product)
                        <div class="col-lg-6 col-xl-4 card-product">
                            <a href="{{route('get.product.productDetail',$product->key_slug)}}"><img src="{{ $product->image }}" alt="natural"></a>
                            <div class="product-title">
                                <a href="{{route('get.product.productDetail',$product->key_slug)}}" class="cl-text-primary fw-normal text-uppercase">
                                    {!! $product->name  !!}
                                </a>
                            </div>
                            <div class="price">${{ moneyFormat($product->price, false) }}</div>
                            <button class="btn btn-outline-main-light btn-add-to-card">ADD TO CART</button>
                        </div>
                    @endforeach
                </div>
            </div>
            <a href="{{ route('get.product.productListing') }}" class="btn btn-outline-main-light btn-shop-more">SHOP MORE</a>
        </section>
        <section id="feedback" class="feedback">
            <h1 class="cl-text-blue text-center feedback-title">CUSTOMERS FEEDBACK</h1>
            <div class="feedback-row">
                <div class="owl-carousel">
                    <div class="feedback-item">
                        <img src="{{ asset('storage/upload/Home/feedback.svg') }}">
                        <div class="text-center">
                            <h4 class="name">Mary Chan</h4>
                            <div class="comment">抗炎幾work啊！谷緊嘅暗瘡搽左之後冇咁腫~~~
                                好用呀！對我濕疹定唔知敏感好有效👍🏻👍🏻
                                親身試過手霜，原本乾到有少少甩皮嘅手指隙位即刻潤返
                                同埋唔「笠」，唔錯唔錯！讚👍🏻
                            </div>
                        </div>
                    </div>
                    <div class="feedback-item">
                        <img src="{{ asset('storage/upload/Home/feedback.svg') }}">
                        <div class="text-center">
                            <h4 class="name">Mary Chan</h4>
                            <div class="comment">抗炎幾work啊！谷緊嘅暗瘡搽左之後冇咁腫~~~
                                好用呀！對我濕疹定唔知敏感好有效👍🏻👍🏻
                                親身試過手霜，原本乾到有少少甩皮嘅手指隙位即刻潤返
                                同埋唔「笠」，唔錯唔錯！讚👍🏻
                            </div>
                        </div>
                    </div>
                    <div class="feedback-item">
                        <img src="{{ asset('storage/upload/Home/feedback.svg') }}">
                        <div class="text-center">
                            <h4 class="name">Mary Chan</h4>
                            <div class="comment">抗炎幾work啊！谷緊嘅暗瘡搽左之後冇咁腫~~~
                                好用呀！對我濕疹定唔知敏感好有效👍🏻👍🏻
                                親身試過手霜，原本乾到有少少甩皮嘅手指隙位即刻潤返
                                同埋唔「笠」，唔錯唔錯！讚👍🏻
                            </div>
                        </div>
                    </div>
                    <div class="feedback-item">
                        <img src="{{ asset('storage/upload/Home/feedback.svg') }}">
                        <div class="text-center">
                            <h4 class="name">Mary Chan</h4>
                            <div class="comment">抗炎幾work啊！谷緊嘅暗瘡搽左之後冇咁腫~~~
                                好用呀！對我濕疹定唔知敏感好有效👍🏻👍🏻
                                親身試過手霜，原本乾到有少少甩皮嘅手指隙位即刻潤返
                                同埋唔「笠」，唔錯唔錯！讚👍🏻
                            </div>
                        </div>
                    </div>
                    <div class="feedback-item">
                        <img src="{{ asset('storage/upload/Home/feedback.svg') }}">
                        <div class="text-center">
                            <h4 class="name">Mary Chan</h4>
                            <div class="comment">抗炎幾work啊！谷緊嘅暗瘡搽左之後冇咁腫~~~
                                好用呀！對我濕疹定唔知敏感好有效👍🏻👍🏻
                                親身試過手霜，原本乾到有少少甩皮嘅手指隙位即刻潤返
                                同埋唔「笠」，唔錯唔錯！讚👍🏻
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="dots" class="row owl-carousel-dots mx-0 justify-content-center indicator">
                <button class="rounded-circle btn indicator-item mx-3 p-0 active"></button>
                <button class="rounded-circle btn indicator-item mx-3 p-0 active"></button>
            </div>
            <div class="d-flex justify-content-center">
                <button class="btn btn-main btn-feedback-more">更多用家分享</button>
            </div>
        </section>
    </div>
@endsection
@push('js')
    <script>
        $(".owl-carousel").owlCarousel({
            margin: 10,
            responsiveClass: true,
            dots: true,
            navText: ['<i class="fas fa-chevron-left"></i>', '<i class="fas fa-chevron-right"></i>'],
            dotsContainer: '#dots',
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                750: {
                    items: 3,
                    nav: false
                },
            }
        });
    </script>
@endpush
