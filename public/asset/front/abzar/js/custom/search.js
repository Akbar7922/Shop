let isPost = false;
// $(document).on('load', function () {
    // $('button#submit_search').trigger('click');
// });
$('button#submit_search').add('button#search_btn').click(function () {
    $('#product_partial').css("opacity" , '50%');
    $('#loader_div').show(900);
    let word = $('input#search_word').val();
    let categoris = [];
    let brands = [];
    // if (isPost) {
        if (category != 0)
            categoris.push(category);
        if (brand != 0)
            brands.push(brand);
    // }
    isPost = true;

    $('input[name=category]:checked').each(function () {
        categoris.push($(this).val());
    });
    $('input[name=brand]:checked').each(function () {
        brands.push($(this).val());
    });
    if(word.trim() == '')
        var wrd = null;
    else
        var wrd = word.trim();
    search(categoris, brands, wrd, search_url, 1);
});

$('#pagination a').on('click', function (e) {
    e.preventDefault();
    $('#product_partial').css("opacity" , '50%');
    $('#loader_div').show(900);
    // let url = $(this).attr('href');
    let page = $(this).text();
    categoris = [];
    brands = [];
    let word = $('input#search_word').val();
    $('input[name=category]:checked').each(function () {
        categoris.push($(this).val());
    });
    $('input[name=brand]:checked').each(function () {
        brands.push($(this).val());
    });
    search(categoris, brands, word.trim(), search_url, page);
});

function search(categories, brands, word, url, page) {
    console.log(categories);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'post',
        url: url,
        data: {
            'page': page,
            'categories': categories,
            'brands': brands,
            'word': word,
        },
        success: function (data) {
            console.log(data);
            $('#product_partial').css("opacity" , '100%');
            $('#loader_div').hide(900);
            showToast(false);
            $('div#product_partial').children().remove();
            $('div#product_partial').append(data);
        },
        error: function (e) {
            $('#product_partial').css("opacity" , '100%');
            $('#loader_div').hide(900);
            showToast(true);
        }
    });
}

function search_paginate(url) {
    $('#product_partial').css("opacity" , '100%');
    $('#loader_div').hide(900);
// $('div#product_partial').children().remove();
    $('div#product_partial').load(url + " div#product_partial");
    $('script#script').load(url + " #script");
}

function showToast(isError) {
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": false,
        "positionClass": "toast-top-center",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    if (isError) {
        let body = "<span style='text-align: right;direction: rtl'> جستجو باخطا مواجه شد ، مجددا تلاش کنید </span>";
        toastr.error(body, 'جستجو');
    } else {
        let body = "<span style='text-align: right;direction: rtl'> جستجو باموفقیت انجام شد </span>";
        toastr.success(body, 'جستجو');
    }
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
