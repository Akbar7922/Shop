$(document).ready(function () {
    $(document).on('click', '.delete', function () {
        let position = $(this).closest('tr').attr('data-position');
        Swal.fire({
            html: `آیا از حذف شرط شماره <span class="badge badge-lg badge-primary">${position}</span> مطمئن هستید ؟`
            , icon: "question"
            , buttonsStyling: false
            , showCancelButton: true
            , confirmButtonText: "بله ، حذف شود"
            , cancelButtonText: 'خیر'
            , customClass: {
                confirmButton: "btn btn-primary"
                , cancelButton: 'btn btn-danger'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                deleteItem($(this));
            }
        });
    });
    $(document).on('click', '#btn_add_item', function () {
        if (validate()) {
            $(this).find('.indicator-label').hide();
            $(this).find('.indicator-progress').show();
            addItem($('#text').val(), $('#type').val(), $(this))
        }
    });

    function validate() {
        var text = $('#text');
        var type = $('#type');
        var status = true;
        if (!text.val()) {
            text.parent().find('.invalid-feedback').show(200);
            text.parent().find('.invalid-feedback').text(' * متن شرط الزامی است');
            status = false;
        }
        if (!type.val()) {
            type.parent().find('.invalid-feedback').show(200);
            type.parent().find('.invalid-feedback').text(' * نوع شرط الزامی است');
            status = false;
        }
        return status;
    }

    function deleteItem(element) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            }
            , type: 'post'
            , url: element.attr('data-link')
            , data: {
                '_method': 'DELETE'
            }
            , success: function (data) {
                console.log(data)
                if (data.status == 200) {
                    element.closest('tr').remove();
                    Swal.fire({
                        text: data.message
                        , icon: 'success'
                        , confirmButtonText: "باشه"
                    })
                } else
                    Swal.fire({
                        text: data.message
                        , icon: 'error'
                        , confirmButtonText: "باشه"
                    })
            }
            , error: function () {
                Swal.fire({
                    text: 'خطا در حذف رکورد ، مجددا تلاش کنید.'
                    , icon: 'error'
                    , confirmButtonText: "باشه"
                })
            }
        });
    }
    function addItem(text, type, element) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            }
            , type: 'post'
            , url: element.attr('data-link')
            , data: {
                'text': text,
                'type': type
            }
            , success: function (data) {
                console.log(data)
                element.find('.indicator-label').show();
                element.find('.indicator-progress').hide();
                if (data.status == 200) {
                    $("#kt_condition_table").load(url+" #kt_condition_table");
                    $('#text').val('');
                    Swal.fire({
                        text: data.message
                        , icon: 'success'
                        , confirmButtonText: "باشه"
                    })
                } else
                    Swal.fire({
                        text: data.message
                        , icon: 'error'
                        , confirmButtonText: "باشه"
                    })
            }
            , error: function () {
                element.find('.indicator-label').show();
                element.find('.indicator-progress').hide();

                Swal.fire({
                    text: 'خطا در حذف رکورد ، مجددا تلاش کنید.'
                    , icon: 'error'
                    , confirmButtonText: "باشه"
                })
            }
        });
    }
});
