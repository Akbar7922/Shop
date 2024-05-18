$(document).ready(function () {
    $(document).on('click', '.pagination a', function (event) {
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        event.preventDefault();
        var myurl = $(this).attr('href');
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

    $(document).on('click', '.delete_user', function (event) {
        let name = $(this).attr('data-name');
        Swal.fire({
            html: `آیا از حذف کاربر <span class="badge badge-primary">${name}</span> مطمئن هستید ؟`
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
                deleteUser($(this));
            }
        });
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

    function deleteUser(element) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            }
            , type: 'post'
            , url: element.attr('data-link')
            , data: {
                'mobile': element.attr('data-mobile')
                , '_method': 'DELETE'
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
});
