$('#btn_editUser').click(function () {
    $(this).find('.indicator-label').fadeOut(0);
    $(this).find('.indicator-progress').fadeIn(0);
    let name = $('input[name=name]');
    let family = $('input[name=family]');
    let email = $('input[name=email]');
    let tell = $('input[name=tell]');
    let isValidate = true;

    if (!name.val()) {
        name.parent().find('.invalid-feedback').text(' * نام اجباری است.');
        name.parent().find('.invalid-feedback').fadeIn();
        isValidate = false;
    }
    if (!family.val()) {
        family.parent().find('.invalid-feedback').text(' * نام خانوادگی اجباری است.');
        family.parent().find('.invalid-feedback').fadeIn();
        isValidate = false;
    }

    if (tell.val())
        if (! $.isNumeric(tell.val())) {
            tell.parent().find('.invalid-feedback').text(' * شماره تلفن نامعتبر است.');
            tell.parent().find('.invalid-feedback').fadeIn();
            isValidate = false;
        }
    if (email.val())
        if (! isEmail(email.val())) {
            email.parent().find('.invalid-feedback').text(' * آدرس ایمیل نامعتبر است.');
            email.parent().find('.invalid-feedback').fadeIn();
            isValidate = false;
        }

    if (isValidate)
        $('#editUserForm').submit();
    else {
        $(this).find('.indicator-label').fadeIn(0);
        $(this).find('.indicator-progress').fadeOut(0);
    }
});

function isEmail(email) {
    const regex =
        /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email);

}
