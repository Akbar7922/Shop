$('#btn_addProduct').click(function () {
    $(this).find('.indicator-label').fadeOut(0);
    $(this).find('.indicator-progress').fadeIn(0);
    let name = $('input[name=name]');
    let category = $('input#category');
    let isValidate = true;

    if (!name.val()) {
        name.parent().find('.invalid-feedback').text(' * نام اجباری است.');
        name.parent().find('.invalid-feedback').fadeIn();
        isValidate = false;
    }
    if (!category.find('option:selected')){
        category.parent().find('.invalid-feedback').text(' * دسته بندی محصول اجباری است.');
        category.parent().find('.invalid-feedback').fadeIn();
        isValidate = false;
    }

    if (isValidate)
        $('#addProductForm').submit();
    else {
        $(this).find('.indicator-label').fadeIn(0);
        $(this).find('.indicator-progress').fadeOut(0);
    }
});
