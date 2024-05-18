$(document).ready(function () {
    $(document).on('click', '#ticket_attachment', function () {
        $(this).find('input[type=file]')[0].click();
    });
    $(document).on('click', '#btn_send_ticket', function () {
        var text = $('#body');
        if (validate(text)) {
            $(this).find('.indicator-label').hide();
            $(this).find('.indicator-progress').show();
            sendTicket(text.val(), $(this))
        }
    });

    function validate(text) {
        if (!text.val()) {
            text.parent().find('.invalid-feedback').show();
            text.parent().find('.invalid-feedback').text(' * متن ارسالی ، اجباری است');
            return false;
        }
        return true;
    }

    function sendTicket(text, element) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'post',
            url: sendTicektUrl,
            data: { 'body': text },
            success: function (data) {
                showToast(data.message, (data.status != 200))
                element.find('.indicator-label').show();
                element.find('.indicator-progress').hide();
            },
            error: function (e) {
                element.find('.indicator-label').show();
                element.find('.indicator-progress').hide();
            }
        });
    }

    function showToast(text, isError) {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toastr-bottom-center",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "30000",
            "hideDuration": "100000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "slideDown",
            "hideMethod": "slideUp"
        };

        // let title = "<span style='text-align: right;direction: rtl'> احرازهویت </span>";
        let body = "<span style='text-align: right;direction: rtl'> " + text + " </span>";
        if (isError)
            toastr.error(body);
        else
            toastr.success(body);
    }


});
