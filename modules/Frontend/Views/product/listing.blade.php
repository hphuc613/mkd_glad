@foreach($data as $item)
<div class="col-md-3">
    <div class="product-item @if((int)$item->discount > 0) sale-off @endif">
        <a href="{{ route('get.product.productDetail', $item->key_slug) }}"><img
                src="{{ asset($item->image) }}" class="mb-3"
                alt="{{ asset($item->image) }}"></a>
        <div class="content text-md-center mb-3">
            <div class="description">
                <a href="{{ route('get.product.productDetail', $item->key_slug) }}"
                   class="title">{{ $item->name }}</a>
            </div>
            <div class="product-price">
                @if((int)$item->discount > 0)
                <span
                    class="price text-secondary text-decoration-line-through">${{ moneyFormat($item->price, false) }}</span>
                <span
                    class="price text-danger">${{ moneyFormat($item->discount, false) }}</span>
                @else
                from <span class="price">${{ moneyFormat($item->price, false) }}</span>
                @endif
            </div>
        </div>
    </div>
</div>
@endforeach
