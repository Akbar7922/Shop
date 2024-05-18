$('.cart-count').change(function (){
    let count = $(this).val();
    let current_row = $(this).closest('tr');
    let price = current_row.attr('data-price');
    let total_price = parseInt(count) * parseFloat(price);
    current_row.find('span.total_price').text(total_price.toLocaleString('en'));
    updateTotalPrice();
});

$('span.cart_item_delete').click(function (){
    let current_row = $(this).closest('tr');
    let cart_id = $(this).attr('data-id');
    $(this).find('i').css('display' , 'none');
    $(this).find('span').css('display' , 'inline-block');
    deleteCartItem($(this) , cart_id , document.getElementById('cartTable').tBodies[0].rows.length);
});
function deleteCartItem(element , id , count) {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'post',
        url: delete_cart_item_link ,
        data: {
            'cart_id': element.attr('data-id'),
        },
        success: function (data) {
            console.log(data);
            if (data.status == 200) {
                notify("سبدخرید", data.message, "success", 5000);
                if(count == 1){
                    $('#cartContainer').contents().remove();
                    $('#cartContainer').append(
                        `<div class="alert alert-info">
                            <h5 class="font-weight-bold">* سبدخرید شما خالی میباشد.</h5>
                        </div>
                        <div class="col-6" style="float: left">
                            <a href="${homeUrl}" class="link-primary back_home" style="">
                                <i class="fa fa-home"></i>
                                بازگشت به صفحه اصلی
                            </a>
                        </div>`);
                }else{
                    element.closest('tr').remove();
                    updateTotalPrice();
                }

            } else
                notify("سبدخرید", data.message, "danger", 5000);

            $(this).find('i').css('display' , 'none');
            $(this).find('span').css('display' , 'inline-block');
        },
        error: function (e) {
            console.log(e);
            notify("سبدخرید", 'خطا ، مجددا تلاش کنید !', "danger", 5000);
            $(this).find('i').css('display' , 'none');
            $(this).find('span').css('display' , 'inline-block');
        }
    });
}
$('form#submit_cart_form button').click(function (){
    let data = [];
    $('table>tbody>tr').each(function (index){
        let object = {'id':$(this).attr('data-id') , 'count' : $(this).find('input[type=number][name=quantity]').val()};
        data.push(object);
    });
    $('form#submit_cart_form').find('input#data').val(JSON.stringify(data));
    $('form#submit_cart_form').submit();
});
function updateTotalPrice(){
    let total_cart_price = 0;
    $('table>tbody>tr').each(function (){
        let total_product_price = $(this).find('span.total_price').text();
        total_product_price = total_product_price.replace(/,/g, "");
        total_cart_price += parseFloat(total_product_price);
    })
    $('tfoot>tr>td>h2#total_cart_price').text(total_cart_price.toLocaleString("en"));
}
function notify(title, body, type) {
    $.notify({
        icon: 'fa fa-check',
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
        delay: 5000 ,
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
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
