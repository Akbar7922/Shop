$(document).ready(function () {
    function setDate() {
        return {
            selectedBefore: !1
            , prevArrow: "\u25c4"
            , nextArrow: "\u25ba"
            , alwaysShow: !1
            , selectableYears: null
            , selectableMonths: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
            , cellWidth: 30, // by px
            cellHeight: 30, // by px
            fontSize: 15, // by px
            isRTL: 1
            , formatDate: "YYYY-0M-0D"
        };
    }

    $("#start_date").persianDatepicker(
        setDate()
    );
    $("#end_date").persianDatepicker(
        setDate()
    );
    $(document).on('click', '#end_time , #start_time', function () {
        this.showPicker();
    });


    $(document).on('click', '#btn_add', function () {
        if (validate()) {
            $(this).find('.indicator-label').hide();
            $(this).find('.indicator-progress').show();
            $('#mainForm').submit();
        }
    });
    function validate() {
        var title = $('#title');
        var start_date = $('#start_date');
        var end_date = $('#end_date');
        var pic = $('#pic');
        var flag = false;
        if (!title.val()) {
            title.parent().find('.invalid-feedback').show(200);
            title.parent().find('.invalid-feedback').text('عنوان تبلیغ نباید خالی باشد.');
            flag = true;
        }
        if (!start_date.val()) {
            start_date.parent().find('.invalid-feedback').show(200);
            start_date.parent().find('.invalid-feedback').text('زمان شروع تبلیغ نباید خالی باشد.');
            flag = true;
        }
        if (!end_date.val()) {
            end_date.parent().find('.invalid-feedback').show(200);
            end_date.parent().find('.invalid-feedback').text('زمان پایان تبلیغ نباید خالی باشد.');
            flag = true;
        }
        if (typeof (isEdit) === 'undefined')
            if (pic[0].files.length === 0) {
                pic.parent().find('.invalid-feedback').show(200);
                pic.parent().find('.invalid-feedback').text('یک تصویر برای اسلایدر انتخاب کنید .');
                flag = true;
            }

        if (!flag) {
            if (start_date.val() >= end_date.val()) {
                showToast('زمان شروع تبلیغ نباید بیشتر از زمان پایان باشد.', true);
                return false;
            }
            return true;
        } return false;

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
