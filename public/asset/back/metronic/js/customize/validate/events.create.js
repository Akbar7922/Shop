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
            , formatDate: "YYYY-0M-0D hh:mm"
        };
    }

    $("#event_date").persianDatepicker(
        setDate()
    );

    $(document).on('click', '#btn_add', function () {
        if (validate()) {
            $(this).find('.indicator-label').hide();
            $(this).find('.indicator-progress').show();
            $('#mainForm').submit();
        }
    });

    function validate() {
        var title = $('#title');
        var event_date = $('#event_date');
        var type = $('#type');
        var body = $('#body');
        var pic = $('#pic');
        var status = true;

        if (!title.val()) {
            title.parent().find('.invalid-feedback').show(200);
            title.parent().find('.invalid-feedback').text(' * عنوان الزامی است');
            status = false;
        }
        if (!type.find(':selected')) {
            type.parent().find('.invalid-feedback').show(200);
            type.parent().find('.invalid-feedback').text(' * انتخاب نوع الزامی است');
            status = false;
        }
        if (!body.val()) {
            body.parent().find('.invalid-feedback').show(200);
            body.parent().find('.invalid-feedback').text(' * متن رویداد / اخبار الزامی است');
            status = false;
        }
        if (typeof (isEdit) === 'undefined')
            if (pic[0].files.length === 0) {
                pic.parent().find('.invalid-feedback').show(200);
                pic.parent().find('.invalid-feedback').text(' * تصویر الزامی است');
                status = false;
            }

        return status;

    }
});
