jQuery(function ($) {
    /* Переключение форм на странице account */

    $(document).on('click', '#new_shipping_address', function () {
       $("#new-address").css('display', 'block');
    });

    $(document).on('click', '#current_shipping_address', function () {
        $("#new-address").css('display', 'none');
    });

    $(document).on('submit', ('#filter_form'), function (e) {
        e.preventDefault();
        let form = $('#filter_form');
        let formData = $(form).serialize();
        $.ajax({
            type: 'GET',
            url: $(form).attr('action'),
            data: formData,
            success: function(response) {
                $('#a').html(response);
            }
        });
    });

    $(document).on('submit', ('#search_catalog'), function (e) {
        e.preventDefault();

        let form = $('#search_catalog');
        let formData = $(form).serialize();
        $.ajax({
            type: 'GET',
            url: $(form).attr('action'),
            data: formData,
            success: function(response) {
                $('#a').html(response);
            }
        })
    });
});
