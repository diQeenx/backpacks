jQuery(function ($) {
    /* Переключение форм на странице account */

    $(document).on('click', '#new_shipping_address', function () {
       $("#new-address").css('display', 'block');
    });

    $(document).on('click', '#current_shipping_address', function () {
        $("#new-address").css('display', 'none');
    });
});
