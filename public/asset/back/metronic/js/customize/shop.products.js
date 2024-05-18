$(document).ready(function () {
    $(document).on('click', '.delete_product', function () {
        let name = $(this).attr('data-name');
        Swal.fire({
            html: `آیا از حذف محصول <span class="badge badge-primary">${name}</span> مطمئن هستید ؟`,
            icon: "question",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "بله ، حذف شود",
            cancelButtonText: 'خیر',
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: 'btn btn-danger'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                deleteProduct($(this));
            }
        });
    });

    function deleteProduct(element) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'post',
            url: element.attr('data-link'),
            data: {
                '_method': 'DELETE'
            },
            success: function (data) {
                console.log(data)
                if (data.status == 200) {
                    element.closest('tr').remove();
                    Swal.fire({
                        text: data.message,
                        icon: 'success',
                        confirmButtonText: "باشه"
                    })
                } else
                    Swal.fire({
                        text: data.message,
                        icon: 'error',
                        confirmButtonText: "باشه"
                    })
            },
            error: function () {
                Swal.fire({
                    text: 'خطا در حذف رکورد ، مجددا تلاش کنید.',
                    icon: 'error',
                    confirmButtonText: "باشه"
                })
            }
        });
    }
    $(document).on('click', '.product_galley', function () {
        $('#modal_gallery').modal('show');
        let shop_product_id = $(this).attr('data-id');
        let delete_link = $(this).attr('data-delete-link');
        let pictures = JSON.parse($(this).attr('data-pics'));
        var name = $(this).closest('tr').find('td:eq(1)').find('span').text();
        $('#modal_gallery').find('#modal_product').text(name);
        $('#modal_gallery #modal_exists_pic').children().remove();
        if (pictures.length > 0) {
            $('#modal_gallery #modal_exists_pic').fadeIn(200);
            $('#modal_gallery #modal_exists_pic').find('img').remove();
            for (let i = 0; i < pictures.length; i++) {
                $('#modal_gallery #modal_exists_pic').append(`
                   <div class="image-input image-input-empty w-80px h-80px"
                        style="background-image: url(${picUrl + '/'+ shop_product_id +'/' + pictures[i].picture}); background-position: center;">
                         <!--begin::Image preview wrapper-->
                         <div class="image-input-wrapper w-75px h-75px"></div>
                         <label class="delete_picture btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                            title="حذف این تصویر"
                            data-position="${i}">
                             <i class="bi bi-trash-fill fs-7"></i>
                         </label>
                    </div>
                `);
            }
            $('.delete_picture').click(function () {
                let position = $(this).attr('data-position');
                deletePicture(shop_product_id, position, delete_link, $(this));
            });
        }

        let url = $(this).attr('data-url');
        $('form#dropzoneForm').attr('action', url);

        $('.dropzone').each(function () {
            let dropzoneControl = $(this)[0].dropzone;
            if (dropzoneControl)
                dropzoneControl.destroy();
        });

        new Dropzone("#shop_products_pictures_dropzone", {
            url: url, // Set the url for your upload script location
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10
            , maxFilesize: 10, // MB
            addRemoveLinks: true,

            sending: function (file, xhr, formData) {
                formData.append("_token", token);
            }
            , success: function (file, response) {
                console.log(response)
            }
        });

    });

    function deletePicture(product_id, position, url, element) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            }
            , type: 'post'
            , url: url
            , data: {
                'position': position
            }
            , success: function (data) {
                console.log(data)
                if (data.status == 200) {
                    element.parent().remove();
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
