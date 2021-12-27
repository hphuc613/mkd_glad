/*** Button Cart ***/
$(document).on('click', '#cart-icon, #cart-icon-mobile', function (e) {
    e.preventDefault();
    var url = $(this).attr('href');
    var box = $(document).find('#cart-box');
    $.ajax({
        async: true,
        url: url,
        type: 'GET',
    }).done(function (response) {
        box.html(response);
    });
});

/*** Increase Quantity ***/
$(document).on('click', 'button.increase', function () {
    var input = $(this).parents('.range-quantity').find('input');
    var value = parseInt(input.val(), 10);
    value = isNaN(value) ? 0 : value;
    value++;
    input.val(value);

    var cost_price = $(this).parents('.range-quantity').find('.cost-price');
    var final_price = $(this).parents('.range-quantity').find('.final-price');
    if (value >= 1) {
        var final_price_value = parseInt(value) * parseInt(cost_price.html());
        final_price.html(final_price_value);
    }
});

/*** Decrease Quantity ***/
$(document).on('click', 'button.decrease', function () {
    var input = $(this).parents('.range-quantity').find('input');
    var value = parseInt(input.val(), 10);
    value = isNaN(value) ? 0 : value;
    value--;
    if (value > 0) {
        input.val(value);
    }

    var cost_price = $(this).parents('.range-quantity').find('.cost-price');
    var final_price = $(this).parents('.range-quantity').find('.final-price');
    if (value >= 1) {
        var final_price_value = parseInt(value) * parseInt(cost_price.html());
        final_price.html(final_price_value);
    }
});

/*** Add to cart ***/
function addToCart(url) {
    $(document).on('click', '#btn-add-to-cart', function () {
        var data = $(this).attr('data-product');
        var select_capacity = $(this).parents('#group-add-to-cart').find("#capacity-select");

        if (select_capacity.length > 0 && select_capacity.val() === "") {
            if ($('html').attr("lang") === "en") {
                alert('Please select the capacity');
            } else {
                alert('請選擇容量');
            }
        } else {
            $.ajax({
                url: url + '?data=' + data + '&capacity=' + (select_capacity.val() ?? ""),
                type: 'get'
            }).done(function (response) {
                if (response.status === 200) {
                    var quantity = $(document).find('.cart-icon').find('.quantity');
                    quantity.html(parseInt(quantity.html()) + 1);

                    $(document).find('.cart-box').removeClass('d-none'); //remove if any
                    $(document).find('.cart-box').addClass('d-none');

                    var lang = $('html').attr('lang');
                    var msg = (lang === 'en') ? 'Successfully Added!' : '添加成功！';
                    new bs5.Toast({
                        className: 'border-0 bg-success text-white',
                        header: `
                                <svg width="24" height="24" class="text-success me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <h6 class="mb-0">Success!</h6>
                                `,
                        body: msg,
                    }).show();
                } else {
                    alert(response.message);
                }
            });
        }
    });
}

/*** Update Cart ***/
function updateCart(url) {
    $(document).on('click', '.increase, .decrease', function () {
        var parent = $(this).parents('.range-quantity');
        var cart_item = parent.find('.cart-item').html();
        var quantity = parent.find('.cart-item-quantity').val();

        $.ajax({
            url: url + '?cart_item=' + cart_item + '&quantity=' + quantity,
            type: 'get'
        }).done(function (response) {
            console.log(response);
            $('#cart-amount').html(response.price);
            $('.quantity-cart-icon').html(response.quantity);
        })
    });
}


/*** Remove Cart ***/
function updateItemCart(url) {
    $(document).on('click', '.remove-cart-item', function () {
        var cart_item = $(this).attr('data-key');

        $.ajax({
            url: url + '?cart_item=' + cart_item + '&remove=' + 1,
            type: 'get'
        }).done(function (response) {
            $('#cart-amount').html(response.price);
            $('.quantity-cart-icon').html(response.quantity);
            var lang = $('html').attr('lang');
            var msg = (lang === 'en') ? 'Successfully Removed!' : '成功移除！';
            new bs5.Toast({
                className: 'border-0 bg-success text-white',
                header: `
                        <svg width="24" height="24" class="text-success me-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <h6 class="mb-0">Success!</h6>
                        `,
                body: msg,
            }).show();
        })
    });
}
