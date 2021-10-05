/***** Action Clear Search *****/
$(document).on('click', 'button.clear', function (event) {
    event.preventDefault();
    var form = $(this).parents('form');
    form.find('input').attr('disabled', 'disabled');
    form.find('select').attr('disabled', 'disabled');
    form.trigger('submit');
});

/***** Action delete *****/
$(document).on('click', '.btn-delete', function (e) {
    e.preventDefault();
    var action = $(this).attr('href');
    var lang = $('html').attr('lang');
    var title = (lang === 'zh-TW') ? "你確定嗎?" : "Are you sure?";
    var text = (lang === 'zh-TW') ? "您将无法还原此内容!" : "You won't be able to revert this!";

    swal.fire({
        title: title,
        text: text,
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: (lang === 'zh-TW') ? '刪除' : 'Delete',
        confirmButtonColor: "#d33",
        cancelButtonText: (lang === 'zh-TW') ? '取消' : 'Cancel',
    }).then((willDelete) => {
        if (willDelete.isConfirmed) {
            window.location.replace(action);
        }
    });
});

/***** Alert Notification *****/
function notificationAlert() {
    var successNoti = $('.success-notification').val();
    if (successNoti !== "") {
        $.toast({
            heading: "Success",
            text: successNoti,
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'success',
            hideAfter: 10000,
            stack: 6
        });
    }

    var dangerNoti = $('.danger-notification').val();
    if (dangerNoti !== "") {
        $.toast({
            heading: "Fail",
            text: dangerNoti,
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'error',
            hideAfter: 10000,
            stack: 6
        });
    }
}

/***** Action Check all item in table *****/
$(document).on('click', '.select-all', function () {
    var class_child = $(this).attr('id');
    if (class_child !== '') {
        var child = $('input.' + class_child);
        if (child.length > 0) {
            console.log('cl');
            child.not(this).prop('checked', this.checked);
        } else {
            if (!$(this).hasClass('select-all-with-other-child')) {
                $('input.checkbox-item').not(this).prop('checked', this.checked);
            }
        }
    } else {
        console.log('ccl');
        $('input.checkbox-item').not(this).prop('checked', this.checked);
    }
});
