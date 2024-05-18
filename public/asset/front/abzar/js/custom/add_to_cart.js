$('.product_add_to_cart').click(function () {
    if (isLogin)
        addToCart($(this).attr('data-id'))
    else
        notify("fa-check", "لطفا وارد شوید", "درحال ارجاع به صفحه ورود .....", "danger", 2000)
});

function addToCart(product_shop_id) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'post',
        url: addToCartUrl,
        data: {
            'shop_product_id': product_shop_id,
            'count': 1
        },
        success: function (data) {
            console.log(data);
            if (data.status == 200)
                notify("fa-check", "سبدخرید", data.message, "success", 5000)
            else
                console.log('nok')
        },
        error: function (e) {
            console.log(e);
        }
    });
}

function notify(icon, title, body, type, delay) {
    $.notify({
        icon: 'fa ' + icon,
        title: title,
        message: body
    }, {
        element: 'body',
        position: null,
        type: type,
        allow_dismiss: false,
        newest_on_top: false,
        showProgressbar: true,
        placement: {
            from: "top",
            align: "right"
        },
        offset: 20,
        spacing: 10,
        z_index: 1031,
        delay: delay,
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        },
        onClose: close() ,
        icon_type: 'class',
        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<button type="button" aria-hidden="true" class="btn-close" data-notify="dismiss"></button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
    });
}
