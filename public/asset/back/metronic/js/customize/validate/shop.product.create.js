$('input#price').add('input#discounted_price').keypress(function (e) {

    let charCode = (e.which) ? e.which : e.keyCode
    if (String.fromCharCode(charCode).match(/[^0-9]/g))
        return false;
    $(this).keyup(function (e) {
        let price = $(this).val().replace(/,/g, "");
        if (price.length > 3)
            $(this).val(Number(price).toLocaleString());
        else
            $(this).val(price);
    });
});

$('input#discounted_price').focus(function (){
    $(this).val($('input#price').val());
});


$('#btn_addShopProduct').click(function () {
    $(this).find('.indicator-label').fadeOut(0);
    $(this).find('.indicator-progress').fadeIn(0);
    let price = $('input#price');
    let count = $('input#count');

    let isValidate = true;

    if (!price.val()) {
        price.parent().find('.invalid-feedback').text(' * قیمت کالا اجباری است.');
        price.parent().find('.invalid-feedback').fadeIn();
        isValidate = false;
    }
    if (!count.val()) {
        count.parent().find('.invalid-feedback').text(' * مقدار فیلد موجودی اجباری است.');
        count.parent().find('.invalid-feedback').fadeIn();
        isValidate = false;
    }

    if (isValidate)
        $('#addShopProductForm').submit();
    else {
        $(this).find('.indicator-label').fadeIn(0);
        $(this).find('.indicator-progress').fadeOut(0);
    }
});
