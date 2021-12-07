<!-- Cart -->
<div class="cart-box selector-close">
    <a href="javascript:" class="d-flex justify-content-end cl-text-blue close close-hide">
        <i class="bi-x" style="font-size: 25px;"></i>關閉
    </a>
    <div class="cart-content">
        <div class="cart-header">
            <h5>購物⾞</h5>
            <hr>
        </div>
        <div class="cart-body pb-4">
            <div class="cart-list">
                <div class="cart-item d-flex">
                    <div class="flex-shrink-0 image">
                        <img src="{{ asset('storage/upload/Home/home_magnificent_cream.svg') }}"
                             alt="{{ asset('storage/upload/Home/home_magnificent_cream.svg') }}">
                    </div>
                    <div class="flex-grow-1 ms-3 content">
                        <h6 class="title">瑰麗亮肌煥彩護療霜 NOURISHING ROSANNA RENEWED TREATMENT</h6>
                        <div class="capacity">Normal 30ml</div>
                        <div class="quantity">1 X <span class="fw-bold">$000.00</span></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-footer">
            <hr>
            <div class="d-flex justify-content-between mb-3">
                <h5>總額:</h5>
                <div class="total-price">HK$000.00</div>
            </div>
            <a href="javascript:" class="btn btn-outline-dark rounded-0 w-100 close close-hide" data-bs-toggle="modal"
               data-bs-target="#modal-cart-detail">
                查看購物⾞
            </a>
        </div>
    </div>
</div>
@include('Cart::frontend.cart_modal')
