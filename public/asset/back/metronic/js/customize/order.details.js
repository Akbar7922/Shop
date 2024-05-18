$(document).ready(function (){
    $(document).on('click' , '#changeStatusOrder' , function() {
        Swal.fire({
            html: `آیا از تغییر وضعیت سفارش <span class="badge badge-primary">${trackingCode}</span> به وضعیت <span class="badge badge-primary">${status}</span> مطمئن هستید ؟`
            , icon: "question"
            , buttonsStyling: false
            , showCancelButton: true
            , confirmButtonText: "بله"
            , cancelButtonText: 'خیر'
            , customClass: {
                confirmButton: "btn btn-primary"
                , cancelButton: 'btn btn-danger'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                changeOrderStatus();
            }
        });

    });

    function changeOrderStatus() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            }
            , type: 'get'
            , url: changeOrderStatusUrl
            , success: function(data) {
                console.log(data)
                if (data.status == 200) {
                    Swal.fire({
                        text: data.message
                        , icon: 'success'
                        , confirmButtonText: "باشه"
                    }).then((result) => {
                        if (result.isConfirmed)
                            window.location = refreshUrl;
                    });
                } else
                    Swal.fire({
                        text: data.message
                        , icon: 'error'
                        , confirmButtonText: "باشه"
                    })

            }
            , error: function(e) {
                console.log(e);
                Swal.fire({
                        text: e
                        , icon: 'error'
                        , confirmButtonText: "باشه"
                    })

            }
        });
    }
});
