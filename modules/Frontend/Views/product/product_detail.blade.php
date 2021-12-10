@extends("Base::frontend.master")

@section("content")
    <div class="container pt-3">
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
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-half"></i>
                                <i class="bi bi-star"></i>
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
                                <img src="../images/lotion-product-detail.svg" alt="">
                                <div class="text">適合乾性、混合性及敏感性皮膚</div>
                            </div>
                            <div class="feature-item d-flex align-items-center">
                                <img src="../images/skin.svg" alt="">
                                <div class="text">以潔淨成份作護膚標準</div>
                            </div>
                            <div class="feature-item d-flex align-items-center">
                                <img src="../images/rating-product-detail.svg" alt="">
                                <div class="text">超過5000位客戶滿意使用效果並回購產品</div>
                            </div>
                            <div class="feature-item d-flex align-items-center">
                                <img src="../images/ship.svg" alt="">
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
                                What is it?
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#benefit" data-bs-toggle="pill" class="nav-link">
                                Benefit
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#ingredients" data-bs-toggle="pill" class="nav-link">
                                Ingredients
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="what-is-it" role="tabpanel">
                            瑰麗亮肌煥彩護療霜 : 11111111 <br>
                            坊間玫瑰乳霜大多為白色，若將玫瑰籽油去除顏色和氣味，則大大減低營養價值。 <br>
                            本產採用的玫瑰籽油保留了原有色澤，所以調製出來的乳霜偏黃，但絕對不令皮膚變黃， <br>
                            使用後反能提亮膚色。
                        </div>
                        <div class="tab-pane fade" id="benefit" role="tabpanel">
                            瑰麗亮肌煥彩護療霜 : 22222222 <br>
                            坊間玫瑰乳霜大多為白色，若將玫瑰籽油去除顏色和氣味，則大大減低營養價值。 <br>
                            本產採用的玫瑰籽油保留了原有色澤，所以調製出來的乳霜偏黃，但絕對不令皮膚變黃， <br>
                            使用後反能提亮膚色。
                        </div>
                        <div class="tab-pane fade" id="ingredients" role="tabpanel">
                            瑰麗亮肌煥彩護療霜 : 333333333 <br>
                            坊間玫瑰乳霜大多為白色，若將玫瑰籽油去除顏色和氣味，則大大減低營養價值。 <br>
                            本產採用的玫瑰籽油保留了原有色澤，所以調製出來的乳霜偏黃，但絕對不令皮膚變黃， <br>
                            使用後反能提亮膚色。
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
                                <a href="{{route('get.product.productDetail',$product->id)}}">
                                    <img src="{{asset($product->image ?? '')}}" class="mb-3"
                                         alt="$product->image ?? ''">
                                </a>
                                <div class="content text-md-center mb-3">
                                    <a href="{{route('get.product.productDetail',$product->id)}}" class="title">
                                        {{$data->name ?? ''}}
                                    </a>
                                    <div class="product-price">from <span class="price">${{$data->price ?? ''}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="container customer-reviews my-5">
                <div class="title">
                    <h1 class="cl-text-blue">{{trans('Customer reviews')}}</h1>
                </div>
                <div class="vote-star-section row">
                    <div class="col-md-6">
                        <div class="row-star d-md-flex">
                            <div class="col-default">
                                <div class="vote-star">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                    <i class="bi bi-star"></i>
                                </div>
                                <div class="text">{{trans('Base on')." ".count($data->feedback)." ".trans('reviews')}} </div>
                            </div>
                            <div class="col-vote">
                                <div class="star-vote-group">
                                    <div class="vote-star p-0">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 90%"
                                             aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="count">
                                        <span class="vote-ratio">90%</span><span class="vote-quantity">(18)</span>
                                    </div>
                                </div>
                                <div class="star-vote-group">
                                    <div class="vote-star p-0">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 10%"
                                             aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="count">
                                        <span class="vote-ratio">10%</span><span class="vote-quantity">(2)</span>
                                    </div>
                                </div>
                                <div class="star-vote-group">
                                    <div class="vote-star p-0">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 0"
                                             aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="count">
                                        <span class="vote-ratio">0%</span><span class="vote-quantity">(0)</span>
                                    </div>
                                </div>
                                <div class="star-vote-group">
                                    <div class="vote-star p-0">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 0"
                                             aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="count">
                                        <span class="vote-ratio">0%</span><span class="vote-quantity">(0)</span>
                                    </div>
                                </div>
                                <div class="star-vote-group">
                                    <div class="vote-star p-0">
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                        <i class="bi bi-star"></i>
                                    </div>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 0"
                                             aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <div class="count">
                                        <span class="vote-ratio me-2">0%</span><span class="vote-quantity">(0)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-outline-main-light btn-write-review">{{trans('WRITE A REVIEW')}}</button>
                        </div>
                    </div>
                </div>
                <div class="sort-order-group">
                    <label>
                        <select class="form-control sort-order-select select2">
                            <option value="PICTURE FIRST">{{trans('PICTURE FIRST')}}</option>
                            <option value="PICTURE FIRST">{{trans('PICTURE SECOND')}}</option>
                        </select>
                    </label>
                </div>
                <hr>
                <div id="feedback-list">
                    <div class="feedback-list feedback-list-has-image row">
                        @foreach($feedback as $item)
                            <div class="col-md-4">
                                <div class="feedback-item card">
                                    @if(!empty($item->image))
                                        <img src="{{asset($item->image ?? '')}}" class="card-img-top"
                                             alt="{{$item->image ?? ''}}">
                                    @endif
                                    <div class="card-body">
                                        <div class="card-info mb-5">
                                            <h6 class="fw-bold m-0">{{$item->member->name ?? '' . $item->member->last_name ?? ''}}</h6>
                                            <div
                                                class="date">{{formatDate(strtotime($item->updated_at ?? ''),'d/m/Y')}}</div>
                                            <div class="vote-star vote-default p-0">
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                                <i class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                        <div class="card-text">
                                            <?= $item->content ?? '' ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="col-md-12">
                            <div class="d-flex justify-content-center">
                                <nav>
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
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
                        <div class="col-md-3">
                            <div class="product-item">
                                <a href="{{route('get.product.productDetail',$product->id)}}"><img
                                        src="{{asset($product->image ?? '')}}" class="mb-3"
                                        alt="{{$product->image ?? ''}}"></a>
                                <div class="content text-md-center mb-3">
                                    <a href="{{route('get.product.productDetail',$product->id)}}" class="title">
                                        {{$data->name ?? ''}}
                                    </a>
                                    <div class="product-price">from <span class="price">${{$data->price ?? ''}}</span>
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
                        <img src="../images/offer-month-bundle-return-product.svg" width="155" alt="">
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
                                    <button class="btn btn-light border-0 rounded-0 w-100 fw-bold">{{trans('Send')}}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
