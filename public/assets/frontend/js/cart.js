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
});

/*** Decrease Quantity ***/
$(document).on('click', 'button.decrease', function () {
    var input = $(this).parents('.range-quantity').find('input');
    var value = parseInt(input.val(), 10);
    value = isNaN(value) ? 0 : value;
    value--;
    if (value > 0){
        input.val(value);
    }
});
