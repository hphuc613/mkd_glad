<!-- Modal Cart -->
<div class="modal modal-cart-detail border-0" id="modal-cart-detail" tabindex="-1"
     aria-hidden="true">
    <div class="modal-dialog modal-lx">
        <div class="modal-content modal-row">
            <div class="modal-body p-0">
                <div class="close-modal">
                    <a href="javascript:" class="d-flex align-items-end" data-bs-dismiss="modal">
                        <i class="bi-x"></i>
                    </a>
                </div>
                <div class="cart-content">
                    <div class="container pb-5" style="border-bottom: 1px solid #d4e2ee;">
                        <div class="modal-title pb-3 mb-5">
                            <h4>以下產品已加⼊購物⾞:</h4>
                        </div>
                        <div class="modal-cart-detail-row row">
                            <div class="col-lg-4">
                                <div class="shopping-overview">
                                    <div class="card border-0 rounded-0">
                                        <div class="card-header text-center">
                                            <h5 class="fw-bold">查看購物⾞</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="cart-count-product text-center p-5">
                                                2購物⾞中的產品
                                            </div>
                                            <div class="cart-total-price d-flex justify-content-between align-items-center py-3 mb-3">
                                                <h5 class="fw-bold">總額:</h5>
                                                <div class="price">$000.00</div>
                                            </div>
                                            <div class="cart-btn">
                                                <button class="btn btn-outline-dark rounded-0">繼續購物</button>
                                                <a href="shopping-cart.html" class="btn btn-main">付款</a>
                                            </div>
                                            <div class="cart-method">
                                                <button class="btn btn-dark btn-method gg-pay">
                                                    Buy with
                                                    <img src="https://www.nicepng.com/png/full/769-7692974_googlepay-2-google-pay-logo-black.png"
                                                         alt="">
                                                </button>
                                                <button class="btn btn-warning btn-method pay-pal">
                                                    <img src="https://cdn.pixabay.com/photo/2015/05/26/09/37/paypal-784404__480.png"
                                                         alt="">
                                                </button>
                                                <button class="btn btn-method shop-pay">
                                                    Shop Pay
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="shopping-list">
                                    <div class="card border-0 rounded-0">
                                        <div class="card-header text-center">
                                            <h5 class="fw-bold">你的訂單</h5>
                                        </div>
                                        <div class="card-body p-0">
                                            <div class="cart-list">
                                                <div class="cart-item row">
                                                    <div class="image col-md-2 col-4">
                                                        <a href="#"><img src="{{ asset('storage/upload/Home/home_lavender_oil.svg') }}" width="100%" alt=""></a>
                                                    </div>
                                                    <div class="col-md-4 col-8">
                                                        <div class="content">
                                                            <a href="#" class="title">瑰麗亮肌煥彩護療霜 NOURISHING ROSANNA RENEWED
                                                                TREATMENT</a>
                                                            <div class="capacity">Normal 30ml</div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 range-quantity">
                                                        <div class="price">$000.00</div>
                                                        <div class="px-2">
                                                            <div class="input-group">
                                                                <button type="button"
                                                                        class="btn rounded-0 border decrease">-
                                                                </button>
                                                                <input type="number" min="1" value="1"
                                                                       class="form-control text-center"
                                                                       oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
                                                                <button type="button"
                                                                        class="btn border rounded-0 increase">+
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="price">$000.00</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container product-list">
                        <div class="title text-center p-4">
                            <h4 class="fw-bold">YOU MAY ALSO LIKE</h4>
                        </div>
                        <div class="container mb-5">
                            <div class="product-list row">
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <a href="product-detail.html"><img src="{{ asset('storage/upload/Home/home_lavender_oil.svg') }}" class="mb-3" alt="{{ asset('storage/upload/Home/home_lavender_oil.svg') }}"></a>
                                        <div class="content text-md-center mb-3">
                                            <a href="product-detail.html" class="title">⾦縷梅⽔凝抗炎護療霜</a>
                                            <div class="description">Moistening Hamamelis Clearing Treatment</div>
                                            <div class="product-price">from <span class="price">$000.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <a href="product-detail.html"><img src="{{ asset('storage/upload/Home/home_lavender_oil.svg') }}" class="mb-3" alt="{{ asset('storage/upload/Home/home_lavender_oil.svg') }}"></a>
                                        <div class="content text-md-center mb-3">
                                            <a href="product-detail.html" class="title">⾦縷梅⽔凝抗炎護療霜</a>
                                            <div class="description">Moistening Hamamelis Clearing Treatment</div>
                                            <div class="product-price">from <span class="price">$000.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <a href="product-detail.html"><img src="{{ asset('storage/upload/Home/home_lavender_oil.svg') }}" class="mb-3" alt="{{ asset('storage/upload/Home/home_lavender_oil.svg') }}"></a>
                                        <div class="content text-md-center mb-3">
                                            <a href="product-detail.html" class="title">⾦縷梅⽔凝抗炎護療霜</a>
                                            <div class="description">Moistening Hamamelis Clearing Treatment</div>
                                            <div class="product-price">from <span class="price">$000.00</span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="product-item">
                                        <a href="product-detail.html"><img src="{{ asset('storage/upload/Home/home_lavender_oil.svg') }}" class="mb-3" alt="{{ asset('storage/upload/Home/home_lavender_oil.svg') }}"></a>
                                        <div class="content text-md-center mb-3">
                                            <a href="product-detail.html" class="title">⾦縷梅⽔凝抗炎護療霜</a>
                                            <div class="description">Moistening Hamamelis Clearing Treatment</div>
                                            <div class="product-price">from <span class="price">$000.00</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
