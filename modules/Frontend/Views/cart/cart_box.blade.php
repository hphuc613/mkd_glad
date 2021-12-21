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
                @if(isset($cart['items']))
                    @foreach($cart['items'] as $item)
                        @php($item_product = $item['product'])
                        <div class="cart-item d-flex">
                            <div class="flex-shrink-0 image">
                                <img src="{{ asset($item_product->image) }}"
                                     alt="{{ asset($item_product->image) }}">
                            </div>
                            <div class="flex-grow-1 ms-3 content">
                                <h6 class="title">{{ $item_product->name }}</h6>
                                <div class="capacity">{{ $item['capacity'] }}</div>
                                <div class="quantity">
                                    {{ $item['quantity'] }} X
                                    <span class="fw-bold">${{ moneyFormat(!empty($item_product->discount) ? $item_product->discount : $item_product->price, false) }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="cart-footer">
            <hr>
            <div class="d-flex justify-content-between mb-3">
                <h5>總額:</h5>
                <div class="total-price">{{ moneyFormat($cart['amount'] ?? 0) }}</div>
            </div>
            <a href="javascript:" class="btn btn-outline-dark rounded-0 w-100 close close-hide" data-bs-toggle="modal"
               data-bs-target="#modal-cart-detail">
                查看購物⾞
            </a>
        </div>
    </div>
</div>
@include('Frontend::cart.cart_modal')
