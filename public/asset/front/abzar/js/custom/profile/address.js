$(document).ready(function() {
    $('#add_address_btn').click(function() {
        $('#modal_add form').submit();
    });

    $('#edit_address_btn').click(function() {
        $('#modal_edit form').submit();
    });

    $('.edit_address').click(function(para) {
        let position = $(this).attr('data-position');
        let modal = $('#modal_edit');
        let address = JSON.parse(addresses.replace(/&quot;/g, '"'))[position];
        modal.modal('show');
        modal.find('#title').val(address.title);
        modal.find('#state option[value=' + address.state_id + ']').prop('selected', true);
        getCities(address.city_id, 'modal_edit');
        modal.find('#postalCode').val(address.postalCode);
        modal.find('#address').val(address.address);
        modal.find('input[name=position]').val(position);
    });
    $('.delete_address').click(function() {
        let title = $(this).attr('data-title');
        let position = $(this).attr('data-position');
        Swal.fire({
            html: `آیا از حذف برند <span class="badge badge-primary">${title}</span> مطمئن هستید ؟`,
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
                deleteAddress($(this), position);
            }
        });
    });

    function deleteAddress(element, position) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'post',
            url: delete_url,
            data: {
                'position': position
            },
            success: function(data) {
                console.log(data)
                if (data.status == 200) {
                    element.closest('div.select-box').remove();
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
            error: function() {
                Swal.fire({
                    text: 'خطا در حذف رکورد ، مجددا تلاش کنید.',
                    icon: 'error',
                    confirmButtonText: "باشه"
                })
            }
        });
    }
});
