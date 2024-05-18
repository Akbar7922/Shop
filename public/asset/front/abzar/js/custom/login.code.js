$(document).ready(function() {
    $('#reset_submit').click(function() {
        $('#forgetForm').find('.error_input').fadeOut(500);
        let password = $('#password');
        let confirm_password = $('#confirm_password');
        let validate = true;
        if (!password.val()) {
            $('#passwordError').fadeIn(200);
            $('#passwordError').text('* رمزعبور اجباری است ');
            validate = false;
        } else if (password.val().length < 6) {
            $('#passwordError').fadeIn(200);
            $('#passwordError').text('* رمزعبور حداقل باید 6 کاراکتر باشد ');
            validate = false;
        }
        if (!confirm_password.val()) {
            $('#confirm_passwordError').fadeIn(200);
            $('#confirm_passwordError').text('* تکرار رمزعبور اجباری است ');
            validate = false;
        }
        if (validate) {
            if (password.val() != confirm_password.val()) {
                $('#confirm_passwordError').fadeIn(200);
                $('#confirm_passwordError').text('* تکرار رمزعبور صحیح نیست ');
                validate = false;
            } else {
                $('#mobile_modal').val($('#mobile_register').val());
                $('#forgetForm').submit();
            }
        }
    });
});
