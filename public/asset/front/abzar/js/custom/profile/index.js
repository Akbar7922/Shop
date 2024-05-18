$(document).ready(function () {

    let clipboard = new ClipboardJS('.dashboard-uniqueCorner');
    clipboard.on('success', function (e) {
        showSuccessToast();
        e.clearSelection();
    });

    function showSuccessToast() {
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": false,
            "positionClass": "toast-bottom-left",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "30000",
            "hideDuration": "100000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        };

        let body = "<span style='text-align: right;direction: rtl'> شناسه شما در حافظه ، کپی شد. </span>";
        toastr.success(body);
    }
});
