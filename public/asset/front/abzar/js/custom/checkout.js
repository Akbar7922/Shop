$('input[name=send_type]').change(function () {
    let shopping_cost = parseFloat($(this).parent().attr('data-cost'));
    let final_total_cart_price = parseFloat(total_cart_price) + shopping_cost;
    if ($('input#installment').is(':checked'))
        final_total_cart_price = final_total_cart_price / 2;
    $('span#shopping_cost').text(shopping_cost.toLocaleString('en'));
    $('span#total_cart_price').text(final_total_cart_price.toLocaleString('en'));
});
$('input[name=send_type]:first').attr('checked', true);
$('input[name=pay_type]:first').attr('checked', true);
$('input[name=send_type]:first').change();
$('button#btn_add_address').click(function () {
    let address_form = $('div#address_form');
    if (address_form.is(':visible')) {
        address_form.hide(1000);
        $(this).find('text').text('آدرس جدید');
        $('select[name=address_list]').prop('disabled', false);
    } else {
        address_form.show(1000);
        $(this).find('text').text('اننخاب از لیست');
        $('select[name=address_list]').prop('disabled', true);
    }
    $('select#state:first').change();
});



$('button#btn_submit_order').click(function () {
    if ($('div#address_form').is(':visible')) {
        let action = $('form#order_form').attr('action').replace('0', '1');
        $('form#order_form').attr('action', action);
        validateAddressForm();
    } else
        $('form#order_form').submit();
});

function validateAddressForm() {
    let title = $('input#title');
    let postal_code = $('input#postal_code');
    let address = $('input#address');
    let status = true;

    if (!title.val()) {
        title.next().text(' * مقدار عنوان اجباری است.');
        status = false;
    }
    if (!address.val()) {
        address.next().text(' * مقدار آدرس اجباری است.');
        status = false;
    }
    if (postal_code.val())
        if (!validate_postal_code(postal_code.val())) {
            postal_code.next().text(' * کدپستی نامعتبر است.');
            status = false;
        }
    if (!status)
        return status;
    $('form#order_form').submit();
}

$('input#installment').change(function (){
    let send_type = $('input[name=send_type]:checked');
    if (this.checked) {
        let shopping_cost = parseFloat(send_type.parent().attr('data-cost'));
        let cart_price = parseFloat(total_cart_price) / 2;
        $('li#installmentsDiv').show(900);
        $('span#total_cart_price').text((cart_price + shopping_cost).toLocaleString('en'));
    }else {
        let shopping_cost = parseFloat(send_type.parent().attr('data-cost'));
        $('li#installmentsDiv').hide(900);
        $('span#total_cart_price').text((parseInt(total_cart_price) + shopping_cost).toLocaleString('en'));
    }
});

function validate_postal_code(postal_code) {
    const pattrn = /(?<!\d)\d{10}(?!\d)/;
    return pattrn.test(postal_code);
}
