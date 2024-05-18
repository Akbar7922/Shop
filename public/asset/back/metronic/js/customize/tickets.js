$(document).ready(function () {
    $(document).on('click', '.close_item', function () {
        let tracking_code = $(this).attr('data-tracking_code');
        Swal.fire({
            html: `آیا از بستن تیکت شماره  <span class="badge badge-primary">${tracking_code}</span> مطمئن هستید ؟`
            , icon: "question"
            , buttonsStyling: false
            , showCancelButton: true
            , confirmButtonText: "بله ، بسته شود"
            , cancelButtonText: 'خیر'
            , customClass: {
                confirmButton: "btn btn-primary"
                , cancelButton: 'btn btn-danger'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                close_item($(this));
            }
        });
    });
    $(document).on('click', 'td:not(.text-end)', function () {
        window.location = $(this).closest("tr").attr('data-link');
    });

    function close_item(element) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            }
            , type: 'post'
            , url: element.attr('data-link')
            , success: function (data) {
                if (data.status == 200) {
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
                    text: 'خطا در انجام عملیات ، مجددا تلاش کنید.'
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
                $('#table').html(data);
                KTMenu.createInstances();
            },
            error: function (e) {
                console.log(e);
            }
        });
    }
});
