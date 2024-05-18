$(document).ready(function () {
    $(document).on('click', '#btn_submit', function (e) {
        var app_name = $('#app_name');
        var mobile = $('#mobile');
        var tell = $('#tell');
        var email = $('#email');
        var slogan = $('#slogan');
        var status = true;

        if (!app_name.val()) {
            app_name.parent().find('.invalid-feedback').fadeIn(200);
            app_name.parent().find('.invalid-feedback').text(' * نام سامانه اجباری است .');
            status = false;
        }
        if (!mobile.val()) {
            mobile.parent().find('.invalid-feedback').fadeIn(200);
            mobile.parent().find('.invalid-feedback').text(' * شماره موبایل اجباری است .');
            status = false;
        }
        if (tell.val())
            if (!$.isNumeric(tell.val())) {
                tell.parent()
                    .find(".invalid-feedback")
                    .text(" * شماره تلفن نامعتبر است.");
                tell.parent().find(".invalid-feedback").fadeIn();
                status = false;
            }

        if (email.val()) {
            if (!IsEmail(email.val())) {
                email.parent().find('.invalid-feedback').fadeIn(200);
                email.parent().find('.invalid-feedback').text(' * آدرس ایمیل نامعتبر است');
                status = false;
            }
        }
        if (!slogan.val()) {
            slogan.parent().find('.invalid-feedback').fadeIn(200);
            slogan.parent().find('.invalid-feedback').text(' * شعار سامانه اجباری است ');
            status = false;
        }

        if (status) {
            $(this).find('.indicator-label').hide();
            $(this).find('.indicator-progress').show();
            $('#mainForm').submit();
        }

    });

    function IsEmail(email) {
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }

});
