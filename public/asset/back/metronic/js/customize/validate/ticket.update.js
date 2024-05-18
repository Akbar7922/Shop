$(document).ready(function () {
    $(document).on('click', '#btn_add', function () {
        if (validate()) {
            $(this).find('.indicator-label').hide();
            $(this).find('.indicator-progress').show();
            $('#mainForm').submit();
        }else
            showToast('لطفا ورودی ها را بررسی کنید.' , true);
    });
    function validate() {
        var title = $('#title');
        var section = $('#section');
        var receiver_id = $('#receiver_id');
        var flag = true;
        if (!title.val()) {
            title.parent().find('.invalid-feedback').show(200);
            title.parent().find('.invalid-feedback').text('عنوان تیکت نباید خالی باشد.');
            flag = false;
        }
        if (!section.val()) {
            section.parent().find('.invalid-feedback').show(200);
            section.parent().find('.invalid-feedback').text('بخش موردنظر نباید خالی باشد.');
            flag = false;
        }
        if (!receiver_id.val()) {
            receiver_id.parent().find('.invalid-feedback').show(200);
            receiver_id.parent().find('.invalid-feedback').text('گیرنده نباید خالی باشد.');
            flag = false;
        }

        return flag;

    }
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


    $("#kt-manager").select2({
        data: selectedManager,
        ajax: {
            url: userSearchUrl,
            dataType: "json",
            type: "POST",
            delay: 250,
            data: function (params) {
                return {
                    mobile: params.term, // search term
                    _token: token,
                };
            },
            processResults: function (data, params) {
                // parse the results into the format expected by Select2
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data, except to indicate that infinite
                // scrolling can be used

                return {
                    results: data,
                };
            },
            cache: true,
        },
        placeholder: "درحال جستجو ...",
        minimumInputLength: 7,
        templateResult: formatRepo,
        templateSelection: formatRepoSelection,
    });

    function formatRepo(repo) {
        if (repo.loading) {
            return "درحال جستجو ...";
        }
        var $container = $(
            "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__avatar' style='width:fit-content;display:inline-block;'><img src='" +
            userPicPath +
            repo.pic +
            "' style='width:70px;'/></div>" +
            "<div class='select2-result-repository__meta' style='width: fit-content;display: inline-block;vertical-align: middle;margin-right: 12px;'>" +
            "<div class='select2-result-repository__title' style='margin-bottom:8px;'></div>" +
            "<div class='select2-result-repository__description'></div>" +
            "</div>" +
            "</div>" +
            "</div>"
        );

        $container.find(".select2-result-repository__title").text(repo.name);
        $container
            .find(".select2-result-repository__description")
            .text(repo.mobile);
        $("#receiver_id").val(repo.id);

        return $container;
    }

    function formatRepoSelection(repo) {
        return repo.name || repo.family;
    }

});
