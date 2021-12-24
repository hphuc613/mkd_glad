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
    if (value >= 1){
        var final_price_value =  parseInt(value) * parseInt(cost_price.html());
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
    if (value >= 1){
        var final_price_value =  parseInt(value) * parseInt(cost_price.html());
        final_price.html(final_price_value);
    }
});

/*** Add to cart ***/
function addToCart(url) {
    $(document).on('click', '.btn-add-to-cart', function () {
        var data = $(this).attr('data-product');
        var select_capacity = $(this).parents('#group-add-to-cart').find("#capacity-select");

        if(select_capacity.length > 0 && select_capacity.val() === ""){
            if ($('html').attr("lang") === "en"){
                alert('Please select the capacity');
            }else{
                alert('請選擇容量');
            }
        }else{
            $.ajax({
                url: url + '?data=' + data + '&capacity=' + (select_capacity.val() ?? ""),
                type: 'get'
            }).done(function (response) {
                if (response.status === 200) {
                    var quantity = $(document).find('.cart-icon').find('.quantity');
                    quantity.html(parseInt(quantity.html()) + 1);

                    $(document).find('.cart-box').removeClass('d-none'); //remove if any
                    $(document).find('.cart-box').addClass('d-none');
                } else {
                    alert(response.message);
                }
            });
        }
    });
}
