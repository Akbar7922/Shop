$(document).ready(function() {
    $('#closeBtn').click(function() {
        Swal.fire({
            html: `می‌خواهید خارج شوید؟`,
            icon: "question",
            buttonsStyling: false,
            showCancelButton: true,
            confirmButtonText: "بله",
            cancelButtonText: 'انصراف',
            customClass: {
                confirmButton: "btn btn-primary",
                cancelButton: 'btn btn-danger'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $('form#logoutForm').submit();
            }
        });

    });
});
