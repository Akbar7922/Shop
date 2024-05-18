$(document).ready(function () {
    $("#show_days").click(function () {
        let daysDiv = $("#days");
        if (daysDiv.css("display") == "none") {
            daysDiv.show(800);
            $(this).find("i").removeClass("fa-arrow-down");
            $(this).find("i").addClass("fa-arrow-up");
        } else {
            daysDiv.hide(800);
            $(this).find("i").removeClass("fa-arrow-up");
            $(this).find("i").addClass("fa-arrow-down");
        }
    });

    function setDate(input, span) {
        return {
            selectedBefore: !1,
            prevArrow: "\u25c4",
            nextArrow: "\u25ba",
            alwaysShow: !1,
            selectableYears: null,
            selectableMonths: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            cellWidth: 30, // by px
            cellHeight: 30, // by px
            fontSize: 15, // by px
            isRTL: 1,
            formatDate: "YYYY-0M-0D 00:00:00",
            onSelect: function () {
                input.val(span.attr("data-gdate"));
            },
        };
    }

    $("#start_date, #start_dateSpan").persianDatepicker(
        setDate($("#input_start_date"), $("#start_date"))
    );
    $("#end_date, #end_dateSpan").persianDatepicker(
        setDate($("#input_end_date"), $("#end_date"))
    );

    $(".closed")
        .add(".closed input[type=checkbox")
        .click(function () {
            let day = $(this).attr("data-day");
            var className = "#day_" + day;
            let status = $(this).find("input[type=checkbox]").is(":checked");
            $(className).find("input[type=time]").prop("disabled", status);
            $(this).find("input[type=checkbox]").prop("checked", status);
        });

    $("select#type").on("change", function () {
        if ($(this).val() == 0) $("#lisence").show(800);
        else $("#lisence").hide(800);
    });

    $("#btn_addShop").click(function () {
        // validate proccess dates
        $(".invalid-feedback").fadeOut();
        var startDate = $("#start_date").attr("data-gdate");
        var endDate = $("#end_date").attr("data-gdate");
        // validate tell , nationalCode
        let manager = $("#kt-manager");
        let name = $("#name");
        let type = $("#type");
        let category = $("#category");
        let centeral = $("#center_shop_id");
        let state = $("#state");
        let city = $("#city");
        let logo = $("#logo");
        let contract = $("#contract");
        let license = $("#license");
        let nationalCode = $("#nationalCode");
        let addrss = $("#address");
        let tell = $("#tell");
        let statusForm = true;

        if (!startDate && !endDate) {
            $("#dateError").text("تاریخ های قرارداد اجباری است .");
            $("#dateError").fadeIn();
            statusForm = false;
        } else if (!startDate) {
            $("#dateError").text("تاریخ شروع قرارداد اجباری است .");
            $("#dateError").fadeIn();
            statusForm = false;
        } else if (!endDate) {
            $("#dateError").text("تاریخ اتمام قرارداد اجباری است .");
            $("#dateError").fadeIn();
            statusForm = false;
        }
        if (startDate >= endDate) {
            $("#dateError").text("تاریخ های قرارداد نامناسب است .");
            $("#dateError").fadeIn();
            statusForm = false;
        }

        if (tell.val())
            if (!$.isNumeric(tell.val())) {
                tell.parent()
                    .find(".invalid-feedback")
                    .text(" * شماره تلفن نامعتبر است.");
                tell.parent().find(".invalid-feedback").fadeIn();
                statusForm = false;
            }
        if (!name.val()) {
            name.parent()
                .find(".invalid-feedback")
                .text(" * نام فروشگاه اجباری است.");
            name.parent().find(".invalid-feedback").fadeIn();
            statusForm = false;
        } else {
            if (name.val().length < 3) {
                name.parent()
                    .find(".invalid-feedback")
                    .text(" * نام فروشگاه باید بیشتر از 3 حرف باشد.");
                name.parent().find(".invalid-feedback").fadeIn();
                statusForm = false;
            }
        }
        if (!manager.val()) {
            manager
                .parent()
                .parent()
                .find(".invalid-feedback")
                .text(" * مدیرعامل فروشگاه اجباری است.");
            manager.parent().parent().find(".invalid-feedback").fadeIn();
            statusForm = false;
        }
        if (!type.val()) {
            type.parent()
                .find(".invalid-feedback")
                .text(" * نوع فروشگاه اجباری است.");
            type.parent().find(".invalid-feedback").fadeIn();
            statusForm = false;
        }
        if (!category.val()) {
            category
                .parent()
                .find(".invalid-feedback")
                .text(" * دسته بندی اجباری است.");
            category.parent().find(".invalid-feedback").fadeIn();
            statusForm = false;
        }
        if (!centeral.val()) {
            centeral
                .parent()
                .find(".invalid-feedback")
                .text(" * دفترمرکزی اجباری است.");
            centeral.parent().find(".invalid-feedback").fadeIn();
            statusForm = false;
        }
        if (!state.val()) {
            state
                .parent()
                .find(".invalid-feedback")
                .text(" * استان اجباری است.");
            state.parent().find(".invalid-feedback").fadeIn();
            statusForm = false;
        }
        if (!city.val()) {
            city.parent().find(".invalid-feedback").text(" * شهر اجباری است.");
            city.parent().find(".invalid-feedback").fadeIn();
            statusForm = false;
        }
        if (isEdit == undefined) {
            if (logo[0].files.length == 0) {
                logo.parent()
                    .find(".invalid-feedback")
                    .text(" * فایل لوگو اجباری است.");
                logo.parent().find(".invalid-feedback").fadeIn();
                statusForm = false;
            }
            if (contract[0].files.length == 0) {
                contract
                    .parent()
                    .find(".invalid-feedback")
                    .text(" * فایل قرارداد اجباری است.");
                contract.parent().find(".invalid-feedback").fadeIn();
                statusForm = false;
            }
            if (type.find("option:selected").val() == 0)
                if (license[0].files.length == 0) {
                    license
                        .parent()
                        .find(".invalid-feedback")
                        .text(" * فایل پروانه کسب اجباری است.");
                    license.parent().find(".invalid-feedback").fadeIn();
                    statusForm = false;
                }
        }
        if (!addrss.val()) {
            addrss
                .parent()
                .parent()
                .find(".invalid-feedback")
                .text(" * آدرس فروشگاه اجباری است.");
            addrss.parent().parent().find(".invalid-feedback").fadeIn();
            statusForm = false;
        }
        if (!nationalCode.val()) {
            nationalCode
                .parent()
                .find(".invalid-feedback")
                .text(" * کدملی مدیر اجباری است.");
            nationalCode.parent().find(".invalid-feedback").fadeIn();
            statusForm = false;
        } else if (!validateNationalCode($("#nationalCode"))) statusForm = false;

        if (!validateWorkTime()) statusForm = false;

        if (statusForm) $("#addShopForm").submit();
    });
    $("#tell").keypress(function (e) {
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
            $(this).parent().find(".invalid-feedback").fadeIn(200);
            $(this)
                .parent()
                .find(".invalid-feedback")
                .text(" * فقط عدد وارد کنید.");
            return false;
        }
    });
    $("#nationalCode").keypress(function (e) {
        if (e.which !== 8 && e.which !== 0 && (e.which < 48 || e.which > 57)) {
            $(this).parent().find(".invalid-feedback").fadeIn(200);
            $(this)
                .parent()
                .find(".invalid-feedback")
                .text(" * فقط عدد وارد کنید.");
            return false;
        }
    });

    function validateWorkTime() {
        $("input[type=time]").removeClass("err_class");
        var workTimeResult = [];
        for (var i = 0; i < 7; i++) {
            var current = $("#day_" + i);
            if (!current.find("input[type=checkbox]").is(":checked")) {
                var itemStatus = [];
                var morning_at = current.find("#morning_at");
                var morning_to = current.find("#morning_to");
                var afternoon_at = current.find("#afternoon_at");
                var afternoon_to = current.find("#afternoon_to");
                var shift = 0;
                if (morning_at.val() && morning_to.val()) {
                    if (morning_at.val() >= morning_to.val()) {
                        itemStatus[0] = "ساعت کاری صبج نامعتبر است.";
                        morning_at.addClass("err_class");
                        morning_to.addClass("err_class");
                        // validateTimes = false;
                    }
                    shift++;
                } else {
                    if (!(!morning_at.val() && !morning_to.val())) {
                        itemStatus[1] = "ساعت کاری صبج تکمیل نمیباشد.";
                        if (!morning_at.val()) morning_at.addClass("err_class");
                        else morning_to.addClass("err_class");
                        // validateTimes = false;
                    }
                }

                if (afternoon_at.val() && afternoon_to.val()) {
                    if (afternoon_at.val() >= afternoon_to.val()) {
                        itemStatus[2] = "ساعت کاری عصر نامعتبر است.";
                        afternoon_at.addClass("err_class");
                        afternoon_to.addClass("err_class");
                        // validateTimes = false;
                    }
                    shift++;
                } else {
                    if (!(!afternoon_at.val() && !afternoon_to.val())) {
                        itemStatus[3] = "ساعت کاری عصر تکمیل نمیباشد.";
                        if (!afternoon_at.val())
                            afternoon_at.addClass("err_class");
                        else afternoon_to.addClass("err_class");

                        // validateTimes = false;
                    }
                }
                if (shift == 2)
                    if (afternoon_at.val() < morning_to.val()) {
                        itemStatus[4] = "شروع ساعت کاری عصر نامعتبر است.";
                        afternoon_at.addClass("err_class");
                        // validateTimes = false;
                    }
                if (itemStatus.length > 0) workTimeResult[i] = itemStatus;
            }
        }

        if (workTimeResult.length > 0) {
            var finalText = "";
            for (var i = 0; i < 7; i++) {
                if (workTimeResult[i] && workTimeResult[i].length > 0) {
                    var str = getDay(i) + " : \n";
                    workTimeResult[i].forEach((item) => {
                        str = str + "* " + item + "\n";
                    });
                    finalText = finalText + str;
                }
            }
            alert(finalText);
            return false;
        }
        return true;
    }

    $("#logo").change(function () {
        return validateLogoFile();
    });
    $("#contract").change(function () {
        return validateContractFile();
    });
    $("#license").change(function () {
        return validateLicenseFile();
    });

    function validateLogoFile() {
        var filePath = $("#logo").val();
        var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
        if (!allowedExtensions.exec(filePath)) {
            showErrorDialog("پسوند فایل لوگو نامعتبر است.");
            $("#logo").val("");
            return false;
        }
        return true;
    }
    function validateContractFile() {
        var filePath = $("#contract").val();
        var allowedExtensions = /(\.pdf)$/i;
        if (!allowedExtensions.exec(filePath)) {
            showErrorDialog("پسوند فایل قرارداد نامعتبر است.");
            $("#contract").val("");
            return false;
        }
        return true;
    }
    function validateLicenseFile() {
        var filePath = $("#license").val();
        var allowedExtensions = /(\.pdf)$/i;
        if (!allowedExtensions.exec(filePath)) {
            showErrorDialog("Invalid file type");
            $("#license").val("");
            return false;
        }
        return true;
    }

    function getDay(day) {
        switch (day) {
            case 0:
                return "شنبه";
                break;
            case 1:
                return "یکشنبه";
                break;
            case 2:
                return "دوشنبه";
                break;
            case 3:
                return "سه شنبه";
                break;
            case 4:
                return "چهارشنبه";
                break;
            case 5:
                return "پنجشنبه";
                break;
            case 6:
                return "جمعه";
                break;
        }
    }

    function validateNationalCode(element) {
        var xv = element.val();
        if (isNaN(xv)) {
            element
                .parent()
                .find(".invalid-feedback")
                .text("لطفا عدد وارد کنید.");
            element.parent().find(".invalid-feedback").fadeIn();
            return false;
        } else if (xv == "") {
            element
                .parent()
                .find(".invalid-feedback")
                .text("کدملی اجباری است.");
            element.parent().find(".invalid-feedback").fadeIn();
            return false;
        } else if (xv.length < 10) {
            element
                .parent()
                .find(".invalid-feedback")
                .text("کدملی وارد شده از ده رقم کمتر است.");
            element.parent().find(".invalid-feedback").fadeIn();
            return false;
        } else {
            var yy = 0;
            var yv = parseInt(yv);
            for (let i = 0; i < xv.length; i++) {
                yv = xv[i] * (xv.length - i);
                yy += yv;
            }
            var x = yy % 11;
            if (x === 0) {
                return true;
            } else {
                element
                    .parent()
                    .find(".invalid-feedback")
                    .text("کدملی نامعتبر است.");
                element.parent().find(".invalid-feedback").fadeIn();
                return false;
            }
            yy = 0;
        }
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

    // $('#kt-manager').on("load", function() {
    //     $('#kt-manager').val('1').trigger('change');
    // });

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
        $("#manager_mobile").val(repo.mobile);

        return $container;
    }

    function formatRepoSelection(repo) {
        return repo.name || repo.family;
    }

    function showErrorDialog(message) {
        Swal.fire({
            text: message,
            icon: "error",
            confirmButtonText: "بستن",
        });
    }
});
