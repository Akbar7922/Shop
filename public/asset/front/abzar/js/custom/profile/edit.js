$(document).ready(function () {
    $('#profile_btn_edit').click(function () {
        let gender = $('input[name=gender]');
        let name = $('#name');
        let family = $('#family');
        let tell = $('#tell');
        let email = $('#email');
        let city = $('#city');
        let isValidate = true;
        if ($('input[name=gender]:checked').length == 0) {
            gender.parent().parent().parent().find('.invalid-feedback').text('لطفا یک جنسیت را انتخاب کنید.');
            gender.parent().parent().parent().find('.invalid-feedback').fadeIn(500);
            isValidate = false;
        }
        if (!name.val()) {
            name.parent().parent().find('.invalid-feedback').text('لطفا نام را وارد کنید.');
            name.parent().parent().find('.invalid-feedback').fadeIn(500);
            isValidate = false;
        }
        if (!family.val()) {
            family.parent().parent().find('.invalid-feedback').text('لطفا نام خانوادگی را وارد کنید.');
            family.parent().parent().find('.invalid-feedback').fadeIn(500);
            isValidate = false;
        }
        if (tell.val()) {
            if (!$.isNumeric(tell.val())) {
                tell.parent().parent().find('.invalid-feedback').text(' * شماره تلفن نامعتبر است.');
                tell.parent().parent().find('.invalid-feedback').fadeIn(500);
                isValidate = false;
            }
        }
        if (email.val()) {
            if (!isEmail(email.val())) {
                email.parent().parent().find('.invalid-feedback').text(' * آدرس ایمیل نامعتبر است.');
                email.parent().parent().find('.invalid-feedback').fadeIn();
                isValidate = false;
            }
        }
        if (city.find('option:selected').length == 0) {
            city.parent().parent().find('.invalid-feedback').text('لطفا یک شهر را انتخاب کنید.');
            city.parent().parent().find('.invalid-feedback').fadeIn(500);
            isValidate = false;
        }

        if (isValidate) {
            $('#edit_profile_form').submit();
        }
    });
    function isEmail(email) {
        var regex =
            /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email))
            return false;
        else
            return true;

    }

});
