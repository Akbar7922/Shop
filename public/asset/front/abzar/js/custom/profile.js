$(document).ready(function() {
    $('#btn_changeAvatar').click(function() {
        $('#modal_avatar').modal('show');
    });
    $('#upload_avatar_btn').click(function() {
        $('#modal_avatar form').submit();
    });
    $('#change_password').click(function() {
        $('#modal_change_password').modal('show');
        createCaptcha();
    });
    $('#change_password_btn').click(function() {
        $('#modal_change_password').find('.invalid-feedback').fadeOut(500);
        if (validateChangePassword($('#modal_change_password')))
            $('#modal_change_password form').submit();
    });

    $('.show_password').click(function() {
        let input = $(this).parent().find('input');
        if (input.attr('type') == 'password') {
            $(this).find('i').removeClass('fa-eye-slash');
            $(this).find('i').addClass('fa-eye');
            $(this).addClass('active');
            input.attr('type', 'text');
        } else if (input.attr('type') == 'text') {
            $(this).find('i').removeClass('fa-eye');
            $(this).find('i').addClass('fa-eye-slash');
            $(this).removeClass('active');
            input.attr('type', 'password');
        }
    });

    $('#recaptcha').click(function(){
        createCaptcha();
    });

    function validateChangePassword(modal) {
        let validate = true;
        let old_password = $('#old_password');
        let password = $('#password');
        let confirm_password = $('#confirm_password');
        let captcha = $('#input_captcha');
        if (!old_password.val()) {
            old_password.parent().find('.invalid-feedback').text('* رمزعبور قبل ، نباید خالی باشد.');
            old_password.parent().find('.invalid-feedback').fadeIn(500);
            validate = false;
        }
        if (!password.val()) {
            password.parent().find('.invalid-feedback').text('* رمزعبور جدید ، نباید خالی باشد.');
            password.parent().find('.invalid-feedback').fadeIn(500);
            validate = false;
        } else if (password.val().length < 6) {
            password.parent().find('.invalid-feedback').text('* رمزعبور ، حداقل باید 6 کاراکتر باشد.');
            password.parent().find('.invalid-feedback').fadeIn(500);
            validate = false;
        }
        if (!confirm_password.val()) {
            confirm_password.parent().find('.invalid-feedback').text('* تکرار رمزعبور ، نباید خالی باشد.');
            confirm_password.parent().find('.invalid-feedback').fadeIn(500);
            validate = false;
        }
        if (!captcha.val()) {
            captcha.parent().parent().find('.invalid-feedback').text('* عبارت امنیتی ، نباید خالی باشد.');
            captcha.parent().parent().find('.invalid-feedback').fadeIn(500);
            validate = false;
        }

        if (validate) {
            if (password.val() != confirm_password.val()) {
                confirm_password.parent().find('.invalid-feedback').text('* تکرار رمزعبور صحیح نمیباشد.');
                confirm_password.parent().find('.invalid-feedback').fadeIn(500);
                validate = false;
            } else {
                if (captcha.val().toUpperCase() != code.toUpperCase()) {
                    captcha.parent().parent().find('.invalid-feedback').text('* عبارت امنیتی ، نادرست است.');
                    captcha.parent().parent().find('.invalid-feedback').fadeIn(500);
                    validate = false;
                }
            }
        }
        return validate;
    }

    $('#logout').click(function() {
        Swal.fire({
            html: `می‌خواهید خارج شوید؟`,
            icon: "question",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "بله",
            cancelButtonText: 'انصراف',
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: 'btn btn-danger'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $('form#logoutForm').submit();
            }
        });
    });

    var code;

    function createCaptcha() {
        //clear the contents of captcha div first
        document.getElementById('captcha').innerHTML = "";
        var charsArray =
            "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
        var lengthOtp = 6;
        var captcha = [];
        for (var i = 0; i < lengthOtp; i++) {
            //below code will not allow Repetition of Characters
            var index = Math.floor(Math.random() * charsArray.length +
                1); //get the next character from the array
            if (captcha.indexOf(charsArray[index]) == -1)
                captcha.push(charsArray[index]);
            else i--;
        }
        var canv = document.createElement("canvas");
        canv.id = "captcha";
        canv.width = 100;
        canv.height = 35;
        var ctx = canv.getContext("2d");
        ctx.font = "25px Georgia";
        ctx.strokeText(captcha.join(""), 0, 30);
        //storing captcha so that can validate you can save it somewhere else according to your specific requirements
        code = captcha.join("");
        document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
    }

});
