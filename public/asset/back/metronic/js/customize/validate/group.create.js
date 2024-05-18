$(document).ready(function () {

    $('#btn_addGroup').click(function () {
        $('input').add('select').removeClass('is-invalid');
        $('.invalid-feedback').hide();
        if(validate())
            checkUniqueName($('#unique_name') , true);
    });


    $('#check_unique_name').click(function () {
        var unique_name = $('#unique_name');
        if (!unique_name.val()) {
            unique_name.addClass('is-invalid');
            unique_name.parent().find('.invalid-feedback').text('شناسه گروه اجباری است.');
            unique_name.parent().find('.invalid-feedback').show();
            showToast('شناسه گروه اجباری است.', true);
            return false;
        }
        unique_name.find('.spinner').show(500);
        checkUniqueName(unique_name , false);
    });

    function checkUniqueName(unique_name , isSubmit ) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'post',
            url: checkUniqueNameUrl,
            data: { 'unique_name': unique_name.val() , 'group_id':group_id },
            success: function (data) {
                unique_name.find('.spinner').hide(500);
                if (data.status == 200){
                    if(isSubmit)
                        $('#addGroupForm').submit();
                    showToast(data.message, false);
                    unique_name.removeClass('is-invalid');
                }
                else{
                    unique_name.addClass('is-invalid');
                    showToast(data.message, true);
                }
            },
            error: function (e) {
                unique_name.find('.spinner').hide(500);
                console.log(e);
                unique_name.addClass('is-invalid');
                showToast(e.getMessage , true);
            }
        });
    }

    function validate() {
        var title = $('#title');
        var type = $('#type');
        var unique_name = $('#unique_name');
        // var title = $('#title');
        var status = true;
        if (!title.val()) {
            title.addClass('is-invalid');;
            title.parent().find('.invalid-feedback').text('نام گروه اجباری است.');
            title.parent().find('.invalid-feedback').show();
            status = false;
        }
        if (!unique_name.val()) {
            unique_name.addClass('is-invalid');;
            unique_name.parent().find('.invalid-feedback').text('شناسه گروه اجباری است.');
            unique_name.parent().find('.invalid-feedback').show();
            status = false;
        }
        if (type[0].length == 0) {
            type.addClass('is-invalid');;
            type.parent().parent().find('.invalid-feedback').text('نام گروه اجباری است.');
            type.parent().find('.invalid-feedback').show();
            status = false;
        }

        return status;
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
