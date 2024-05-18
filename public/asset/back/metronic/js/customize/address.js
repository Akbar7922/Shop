$('.delete_address').click(function () {
    let title = $(this).attr('data-title');
    Swal.fire({
        html: `آیا از حذف آدرس <span class="badge badge-primary">${title}</span> مطمئن هستید ؟`,
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
            deleteAddress($(this));
        }
    });
});

$('.address_edit').click(function () {
    let modal = $('#kt_modal_add_customer');
    modal.modal('show');
    let address = JSON.parse($(this).closest('tr').attr('data-address'));
    $('#modal_title').text('ویرایش آدرس ' + address.title);
    modal.find('input[name=position]').val($(this).attr('data-position'));
    modal.find('input#title').val(address.title);
    modal.find('input#postalCode').val(address.postalCode);
    modal.find('textarea#address').val(address.address);
    modal.find('select#state option[value=' + address.state_id + ']').prop('selected', true);
    getCities(address.city_id);
    console.log(address.city_id)
    $('form#modal_add_address_form').attr('action', editUrl);

});


$('button#modal_address_add').click(function () {
    let title = $('input#title');
    let city = $('select#city');
    let address = $('textarea#address');
    let postal_code = $('input#postalCode');
    let isOk = true;
    if (!title.val()) {
        $('span#title_error').fadeIn(200);
        $('span#title_error').text(' * عنوان آدرس اجباری است .');
        isOk = false;
    }
    if (!address.val()) {
        $('span#address_error').fadeIn(200);
        $('span#address_error').text(' * آدرس اجباری است .');
        isOk = false;
    }
    if (postal_code.val())
        if (!validate_postal_code(postal_code.val())) {
            $('span#postal_code_error').fadeIn(200);
            $('span#postal_code_error').text(' * کدپستی نامعتبر است .');
            isOk = false;
        }

    if (isOk) {
        $('input[name=state]').val($('select#state option:selected').text());
        $('input[name=city]').val($('select#city option:selected').text());
        $('form#modal_add_address_form').submit();
    }

});

$('#state').on('change', function () {
    getCities(0);
});


$('#kt_modal_add_customer #kt_modal_add_customer_close').add('#kt_modal_add_customer_cancel').click(function () {
    $('#kt_modal_add_customer').modal('hide');
});


function validate_postal_code(postal_code) {
    const pattrn = /(?<!\d)\d{10}(?!\d)/;
    return pattrn.test(postal_code);
}

function deleteAddress(element) {
    let position = element.attr('data-position');
    let url = element.attr('data-link');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'post',
        url: url,
        data: {'position': position},
        success: function (data) {
            console.log(data)
            if (data.status == 200) {
                $('tr#' + position).remove();
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

function getCities(city_id) {
    let state_id = $('#state' + " option:selected").val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'post',
        url: getCitiesUrl,
        data: {'state_id': state_id},
        success: function (data) {
            if (data.length > 0) {
                $('#city').empty();
                let optionText, optionValue;
                for (let i = 0; i < data.length; i++) {
                    optionText = data[i]['name'];
                    optionValue = data[i]['id'];

                    $('#city').append(`<option value="${optionValue}">
                                ${optionText}
                            </option>`);
                }
                if (city_id > 0)
                    $('select#city option[value=' + city_id + ']').prop('selected', true);
            }
        },
        error: function (e) {
            console.log(e);
        }
    });
}
