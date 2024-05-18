$("div#product_count_box button").click(function () {
    let data_type = $(this).attr('data-type');
    let count_input = $('div#product_count_box input[name=quantity]');
    if (data_type == "minus") {
        if (parseInt(count_input.val()) > 1)
            count_input.val(parseInt(count_input.val()) - 1);
    } else if (data_type == "plus") {
        if (parseInt(count_input.val()) < parseInt(count_input.attr('max')))
            count_input.val(parseInt(count_input.val()) + 1);
    }
});
$('#product_add_to_cart').click(function () {
    $(this).find('.indicator-label').css('display', 'none');
    $(this).find('.indicator-progress').css('display', 'inline-block');
    if (isLogin)
        addToCart($(this), $('div#product_count_box input[name=quantity]').val(), true);
    else {
        notify("fa-check", "لطفا وارد شوید", "درحال ارجاع به صفحه ورود .....", "danger", 2000, true);
        $(this).find('.indicator-label').css('display', 'inline-block');
        $(this).find('.indicator-progress').css('display', 'none');
    }
});

$('#product_add_to_favorite').click(function () {
    $(this).find('i').css('display', 'none');
    $(this).find('span').css('display', 'inline-block');
    if (isLogin)
        addToFavorites($(this), true);
    else {
        notify("fa-check", "لطفا وارد شوید", "درحال ارجاع به صفحه ورود .....", "danger", 2000, true);
        $(this).find('i').css('display', 'inline-block');
        $(this).find('span').css('display', 'none');
    }
});

$('.product_add_to_cart').click(function () {
    $(this).find('i').css('display', 'none');
    $(this).find('span').css('display', 'inline-block');
    let inCart = $(this).attr('data-inCart');
    if (typeof inCart !== 'undefined' && inCart !== false) {
        if (inCart == 1) {
            $(this).find('i').css('display', 'inline-block');
            $(this).find('span').css('display', 'none');
            window.location = cart_url;
        } else if (inCart == 0) {
            if (isLogin)
                addToCart($(this), 1, false);
            else{
                $(this).find('i').css('display', 'inline-block');
                $(this).find('span').css('display', 'none');
                notify("fa-check", "لطفا وارد شوید", "درحال ارجاع به صفحه ورود .....", "danger", 2000, true);
            }
        }
    } else {
        if (isLogin)
            addToCart($(this), 1, false);
        else{
            $(this).find('i').css('display', 'inline-block');
            $(this).find('span').css('display', 'none');
            notify("fa-check", "لطفا وارد شوید", "درحال ارجاع به صفحه ورود .....", "danger", 2000, true);
        }
    }
});
$('.product_add_to_fav').click(function () {
    $(this).find('i').css('display', 'none');
    $(this).find('span').css('display', 'inline-block');
    if (isLogin)
        addToFavorites($(this), true);
    else {
        notify("fa-check", "لطفا وارد شوید", "درحال ارجاع به صفحه ورود .....", "danger", 2000, true);
        $(this).find('i').css('display', 'inline-block');
        $(this).find('span').css('display', 'none');
    }
});
function addToCart(element, count, is_product_page) {
    let isDash = element.attr('data-dash');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'post',
        url: addToCartUrl,
        data: {
            'shop_product_id': element.attr('data-id'),
            'count': count ,
            'discount_id':discount_id
        },
        success: function (data) {
            console.log(data);
            if (data.status == 200) {
                notify("fa-check", "سبدخرید", data.message, "success", 5000, false);
                if (typeof isDash !== 'undefined' && isDash !== false) {
                    element.find('i').css('display', 'inline-block');
                    element.find('span').css('display', 'none');
                    element.find('i').removeClass('fa-cart-plus');
                    element.find('i').addClass('fa-shopping-cart');
                    element.attr('data-inCart', 1);
                } else {
                    element.remove();
                    if ($('span#cart_buttons').children().length <= 1)
                        $('span#cart_buttons').append(`<a href="${cart_url}" id="show_cart"
                                           class="btn btn-solid hover-solid btn-animation btn-rounded">
                                            <span class="indicator-label">مشاهده سبد</span>
                                        </a>`);
                }
            } else
                notify("fa-check", "سبدخرید", data.message, "danger", 5000, false);
            if (is_product_page) {
                element.find('.indicator-label').css('display', 'inline-block');
                element.find('.indicator-progress').css('display', 'none');
            }
        },
        error: function (e) {
            console.log(e);
            if (is_product_page) {
                element.find('.indicator-label').css('display', 'inline-block');
                element.find('.indicator-progress').css('display', 'none');
            }
        }
    });
}

function showProgress(name,) {
    Swal.fire({
        html: `آیا از حذف محصول <span class="badge badge-primary">${name}</span> مطمئن هستید ؟`,
        icon: "question",
        buttonsStyling: false,
        showCancelButton: true,
        confirmButtonText: "بله ، حذف شود",
        cancelButtonText: 'خیر',
        customClass: {
            confirmButton: "btn btn-primary",
            cancelButton: 'btn btn-danger'
        }
    }).then((result) => {
        if (result.isConfirmed) {
            deleteProduct($(this));
        }
    });
}

function addToFavorites(element, is_product_page) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'post',
        url: add_product_favorite_url,
        data: {
            'shop_product_id': element.attr('data-id'),
        },
        success: function (data) {
            console.log(data);
            if (data.status == 200) {
                notify("fa-check", "محصولات موردعلاقه", data.message, "success", 5000, false);
                if (element.find('i').hasClass("fa-heart")) {
                    element.find('i').removeClass("fa-heart");
                    element.find('i').addClass("fa-heart-o");
                } else {
                    element.find('i').removeClass("fa-heart-o");
                    element.find('i').addClass("fa-heart");
                }
            } else
                notify("fa-check", "محصولات موردعلاقه", data.message, "danger", 5000, false);
            if (is_product_page) {
                element.find('i').css('display', 'inline-block');
                element.find('span').css('display', 'none');
            }
        },
        error: function (e) {
            console.log(e);
            if (is_product_page) {
                element.find('i').css('display', 'inline-block');
                element.find('span').css('display', 'none');
            }
        }
    });
}

function notify(icon, title, body, type, delay, isClose) {
    $.notify({
        icon: 'fa ' + icon,
        title: title + '<br>',
        message: body
    }, {
        element: 'body',
        position: null,
        type: type,
        allow_dismiss: false,
        newest_on_top: false,
        // showProgressbar: true,
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
        onClose: function () {
            if (isClose)
                window.location = redirect_login_url;
        },
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
