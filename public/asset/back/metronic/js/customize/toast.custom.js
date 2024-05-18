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
