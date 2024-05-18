$(document).ready(function () {
    $(document).on('click', '.edit_item', function () {
        let modal = $('#modal_edit');
        modal.modal('show');
        currentRow = $(this).closest('div.col');
        let item = JSON.parse(currentRow.attr('data-item'));
        modal.find('form').attr('action', $(this).attr('data-link'));
        modal.find('#title').val(item.title);
        modal.find('#item_name').text(item.title);
        modal.find('#image').attr('src', base_path + '/' + item.pics);
    });

    $(document).on('click', '.delete_item', function () {
        let name = $(this).attr('data-name');
        Swal.fire({
            html: `آیا از حذف تصویر  <span class="badge badge-primary">${name}</span> مطمئن هستید ؟`
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
        if (validate($('#modal_add form'), true)){
            $(this).find('.indicator-label').hide();
            $(this).find('.indicator-progress').show();
            $('#modal_add form').submit();}
    });
    $(document).on('click', '#btn_update_item', function () {
        if (validate($('#modal_edit form'), false)){
            $(this).find('.indicator-label').hide();
            $(this).find('.indicator-progress').show();
            $('#modal_edit form').submit();}
    });

    function validate(modal, isAdd) {
        var title = modal.find('#title');
        var pic = modal.find('#pic');
        var status = true;
        if (!title.val()) {
            title.parent().find('.invalid-feedback').show(200);
            title.parent().find('.invalid-feedback').text(' * عنوان تصویر الزامی است');
            status = false;
        }
        if (isAdd)
            if (pic[0].files.length === 0) {
                pic.parent().find('.invalid-feedback').show(200);
                pic.parent().find('.invalid-feedback').text(' * تصویر الزامی است');
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
                    element.closest('div.col').remove();
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
    $(document).on('click', '.pagination a', function (event) {
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];

        $("#table").empty().html(`
        <div class="row container">
            <div class="text-center" style="margin: 1rem 0.5rem;font-size: 1.5rem;">
                <span class="text">درحال دریافت  اطلاعات ، لطفا شکیبا باشید .... </span>
                <span class="spinner spinner-border spinner-border-sm align-middle ms-2" style="display:inline-block"></span>
            </div>
        </div>
        `);

        search(page);
    });
    $(document).on('keyup', '#search_input', function (event) {
        // if ($(this).val().length >= 3) {
        $("#table").empty().html(`
                <div class="row container">
                    <div class="text-center" style="margin: 1rem 0.5rem;font-size: 1.5rem;">
                        <span class="text">درحال دریافت  اطلاعات ، لطفا شکیبا باشید .... </span>
                        <span class="spinner spinner-border spinner-border-sm align-middle ms-2" style="display:inline-block"></span>
                    </div>
                </div>
            `);
        search(1);
        // }
    });

    function search(page) {
        var word = $('#search_input').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'post',
            url: search_url + '?page=' + page,
            data: { 'word': word },
            success: function (data) {
                // console.log(data)
                $('#table').html(data);
                KTMenu.createInstances();
            },
            error: function (e) {
                console.log(e);
            }
        });
    }
});
