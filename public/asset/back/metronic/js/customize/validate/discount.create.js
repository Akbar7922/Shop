$(document).ready(function () {
    var isPercetage = true;
    function setDate(input, span) {
        return {
            selectedBefore: !1
            , prevArrow: "\u25c4"
            , nextArrow: "\u25ba"
            , alwaysShow: !1
            , selectableYears: null
            , selectableMonths: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
            , cellWidth: 30, // by px
            cellHeight: 30, // by px
            fontSize: 15, // by px
            isRTL: 1
            , formatDate: "YYYY-0M-0D"
            , onSelect: function () {
                input.val(span.attr("data-gdate"));
            }
            ,
        };
    }

    $("#start_date, #start_dateSpan").persianDatepicker(
        setDate($("#input_start_date"), $("#start_date"))
    );
    $("#end_date, #end_dateSpan").persianDatepicker(
        setDate($("#input_end_date"), $("#end_date"))
    );

    var discount = $('#discount');
    var code = $('#code');
    $('#percentage').click(function () {
        isPercetage = true;
        discount.val('');
        discount.attr('placeholder', 'درصد تخفیف را وارد کنید ...');
        $(this).removeClass('btn-outline-primary');
        $(this).addClass('btn-primary');
        $('#price').addClass('btn-outline-success');
        $('#price').removeClass('btn-success');
    });
    $('#price').click(function () {
        isPercetage = false;
        discount.val('');
        discount.attr('placeholder', 'مبلغ تخفیف را وارد کنید ...');
        $(this).removeClass('btn-outline-success');
        $(this).addClass('btn-success');
        $('#percentage').addClass('btn-outline-primary');
        $('#percentage').removeClass('btn-primary');
    });

    discount.keypress(function (e) {
        let charCode = (e.which) ? e.which : e.keyCode
        if (String.fromCharCode(charCode).match(/[^0-9]/g))
            return false;
        $(this).keyup(function () {
            var value = $(this).val();
            if (isPercetage) {
                if (value.length > 2)
                    $(this).val('100');
                else
                    $(this).val(value);
            } else {
                let price = $(this).val().replace(/,/g, "");
                if (price.length > 3)
                    $(this).val(Number(price).toLocaleString());
                else
                    $(this).val(price);
            }
        });
    });

    code.keypress(function (e) {
        let charCode = (e.which) ? e.which : e.keyCode
        if (String.fromCharCode(charCode).match(/[^a-zA-Z0-9]/g))
            return false;
    });

    $('#generateCode').click(function () {
        var element = $(this);
        element.find('.text').hide();
        element.find('.spinner').show();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'post',
            url: generateDiscountCode,
            success: function (data) {
                element.find('.text').show();
                element.find('.spinner').hide();
                if (data) {
                    if (data.status == 200) {
                        $('#code').val(data.code);
                        showToast(data.message, false);
                    }
                    else
                        showToast(data.message, true);
                } else
                    showToast('خطا ، مجددا تلاش کنید.', true);
            },
            error: function (e) {
                console.log(e);
                showToast(e, true);
                element.find('.text').show();
                element.find('.spinner').hide();
            }
        });
    });

    $('.entity').click(function () {
        var radio = $(this).find('input[type=radio]');
        radio.prop('checked', true);
        $('.entity').css('opacity', '50%');
        $(this).css('opacity', '100%');
        switch (radio.val()) {
            case '1':
                if ($('#shop_id')[0].length == 0)
                    getShops();
                break;
            case '1':
                if ($('#shop_product_id')[0].length == 0)
                    getShopProducts();
                break;
            case '2':
                if ($('#category_id')[0].length == 0)
                    getCategories();
                break;
            case '3':
                if ($('#brand_id')[0].length == 0)
                    getBrands();
                break;
            default:
                break;
        }

    });

    $('.for').click(function () {
        var radio = $(this).find('input[type=radio]');
        radio.prop('checked', true);
        $('.for').css('opacity', '50%');
        $(this).css('opacity', '100%');
        if ((radio.val() == '1') && ($('#user_id')[0].length == 0))
            getUsers();
        else if ((radio.val() == '0') && ($('#group_id')[0].length == 0))
            getGroups();

    });

    $('#validateCode').click(function () {
        validateCode(false, $(this));
    });

    function validateCode(isFinal, element = null) {
        var codeElement = $('#code');
        codeElement.parent().parent().find('.invalid-feedback').hide();
        if (!codeElement.val()) {
            codeElement.parent().parent().find('.invalid-feedback').text(' * مقدار کدتخفیف اجباری است.');
            codeElement.parent().parent().find('.invalid-feedback').show(1000);
            return false;
        }
        if (!isFinal) {
            element.find('.text').hide();
            element.find('.spinner').show();
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'post',
            url: validateDiscountCode,
            data: { 'discountCode': codeElement.val(), 'discount_id': discount_id },
            success: function (data) {
                if (!isFinal) {
                    element.find('.text').show();
                    element.find('.spinner').hide();
                } else {
                    $('#btn_addDiscount').find('.indicator-progress').hide();
                    $('#btn_addDiscount').find('.indicator-label').show();
                }
                if (data) {
                    if (data.status == 200)
                        if (isFinal) {
                            $('input[name=isPercentage]').val(getIsPercentage());
                            $('#addDiscountForm').submit();
                        }
                        else
                            showToast(data.message, false);
                    else {
                        if (isFinal) {
                            $('#btn_addDiscount').find('.indicator-progress').hide();
                            $('#btn_addDiscount').find('.indicator-label').show();
                        }
                        showToast(data.message, true);
                    }
                } else {
                    if (isFinal) {
                        $('#btn_addDiscount').find('.indicator-progress').hide();
                        $('#btn_addDiscount').find('.indicator-label').show();
                    }
                    showToast('خطا ، مجددا تلاش کنید.', true);
                }
            },
            error: function (e) {
                showToast(e, true);
                if (!isFinal) {
                    element.find('.text').show();
                    element.find('.spinner').hide();
                } else {
                    $('#btn_addDiscount').find('.indicator-progress').hide();
                    $('#btn_addDiscount').find('.indicator-label').show();
                }
            }
        });
    }

    function getIsPercentage() {
        if (isPercetage)
            return 1;
        return 0;
    }

    function getShops() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'post',
            url: getShopsUrl,
            success: function (data) {
                data = data.data;
                if (data.length > 0) {
                    for (let i = 0; i < data.length; i++) {
                        optionText = data[i]['name'];
                        optionValue = data[i]['id'];
                        $('#shop_id').append(`<option value="${optionValue}"> ${optionText} </option>`);
                    }
                } else
                    showToast('خطا ، مجددا تلاش کنید.', true);
            },
            error: function (e) {
                console.log(e);
                showToast(e, true);
            }
        });
    }
    function getShopProducts() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'post',
            url: getShopProductsUrl,
            success: function (data) {
                data = data.data;
                if (data.length > 0) {
                    for (let i = 0; i < data.length; i++) {
                        optionText = data[i]['product']['name'];
                        optionValue = data[i]['id'];
                        $('#shop_product_id').append(`<option value="${optionValue}"> ${optionText} </option>`);
                    }
                } else
                    showToast('خطا ، مجددا تلاش کنید.', true);
            },
            error: function (e) {
                console.log(e);
                showToast(e, true);
            }
        });
    }

    function getCategories() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'post',
            url: getCategoriesUrl,
            success: function (data) {
                if (data.length > 0) {
                    for (let i = 0; i < data.length; i++) {
                        optionText = data[i]['name'];
                        optionValue = data[i]['id'];
                        $('#category_id').append(`<option value="${optionValue}"> ${optionText} </option>`);
                    }
                } else
                    showToast('خطا ، مجددا تلاش کنید.', true);
            },
            error: function (e) {
                console.log(e);
                showToast(e, true);
            }
        });

    }

    function getBrands() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'post',
            url: getBrandsUrl,
            success: function (data) {
                if (data.length > 0) {
                    for (let i = 0; i < data.length; i++) {
                        optionText = data[i]['name'];
                        optionValue = data[i]['id'];
                        $('#brand_id').append(`<option value="${optionValue}"> ${optionText} </option>`);
                    }
                } else
                    showToast('خطا ، مجددا تلاش کنید.', true);
            },
            error: function (e) {
                console.log(e);
                showToast(e, true);
            }
        });

    }

    function getUsers() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'post',
            url: getUsersUrl,
            success: function (data) {
                if (data.length > 0) {
                    for (let i = 0; i < data.length; i++) {
                        optionText = data[i]['name'] + ' ' + data[i]['family'] + ' - ' + data[i]['mobile'];
                        optionValue = data[i]['id'];
                        $('#user_id').append(`<option value="${optionValue}"> ${optionText} </option>`);
                    }
                } else
                    showToast('خطا ، مجددا تلاش کنید.', true);
            },
            error: function (e) {
                console.log(e);
                showToast(e, true);
            }
        });

    }
    function getGroups() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'post',
            url: getGroupsUrl,
            success: function (data) {
                if (data.length > 0) {
                    for (let i = 0; i < data.length; i++) {
                        optionText = data[i]['title'];
                        optionValue = data[i]['id'];
                        $('#group_id').append(`<option value="${optionValue}"> ${optionText} </option>`);
                    }
                } else
                    showToast('خطا ، مجددا تلاش کنید.', true);
            },
            error: function (e) {
                console.log(e);
                showToast(e, true);
            }
        });

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

    $('#btn_addDiscount').click(function () {
        var thisElement = $(this);
        thisElement.find('.indicator-progress').show();
        thisElement.find('.indicator-label').hide();

        var entityRadio = $('radio#check').val();
        var forRadio = $('radio#for').val();
        var status = true;
        switch (entityRadio) {
            case '1':
                if ($('#shop_product_id')[0].length == 0) {
                    status = false;
                    $('#shop_product_id').parent().find('.invalid-feedback').text('لطفا یک فروشگاه را انتخاب کنید.');
                    $('#shop_product_id').parent().find('.invalid-feedback').show();
                }
                break;
            case '2':
                if ($('#category_id')[0].length == 0) {
                    status = false;
                    $('#category_id').parent().find('.invalid-feedback').text('لطفا یک دسته بندی را انتخاب کنید.');
                    $('#category_id').parent().find('.invalid-feedback').show();
                }
                break;
            case '3':
                if ($('#brand_id')[0].length == 0) {
                    status = false;
                    $('#brand_id').parent().find('.invalid-feedback').text('لطفا یک برند را انتخاب کنید.');
                    $('#brand_id').parent().find('.invalid-feedback').show();
                }
                break;
            default:
                break;
        }

        if (forRadio == '0') {
            if ($('#group_id')[0].length == 0) {
                status = false;
                $('#group_id').parent().find('.invalid-feedback').text('لطفا یک گروه را انتخاب کنید.');
                $('#group_id').parent().find('.invalid-feedback').show();
            }
        } else if (forRadio == '1') {
            if ($('#user_id')[0].length == 0) {
                status = false;
                $('#user_id').parent().find('.invalid-feedback').text('لطفا یک کاربر را انتخاب کنید.');
                $('#user_id').parent().find('.invalid-feedback').show();
            }
        }

        if (!$('#discount').val()) {
            status = false;
            $('#discount').parent().parent().find('.invalid-feedback').text(' * مقدار تخفیف اجباری است .');
            $('#discount').parent().parent().find('.invalid-feedback').show();

        }
        if (!$('#code').val()) {
            status = false;
            $('#code').parent().parent().find('.invalid-feedback').text(' * مقدار کدتخفیف اجباری است .');
            $('#code').parent().parent().find('.invalid-feedback').show();

        }
        if (!$('#start_time').val()) {
            status = false;
            $('#start_time').parent().find('.invalid-feedback').text(' * زمان شروع تخفیف اجباری است .');
            $('#start_time').parent().find('.invalid-feedback').show();

        }
        if (!$('#end_time').val()) {
            status = false;
            $('#end_time').parent().find('.invalid-feedback').text(' * زمان پایان تخفیف اجباری است .');
            $('#end_time').parent().find('.invalid-feedback').show();

        }
        if (!$('#input_start_date').val()) {
            status = false;
            $('#start_date').parent().find('.invalid-feedback').text(' * تاریخ شروع تخفیف اجباری است .');
            $('#start_date').parent().find('.invalid-feedback').show();

        }
        if (!$('#input_end_date').val()) {
            status = false;
            $('#end_date').parent().find('.invalid-feedback').text(' * تاریخ پایان تخفیف اجباری است .');
            $('#end_date').parent().find('.invalid-feedback').show();

        }

        if (status)
            if (validateDate())
                validateCode(true);
            else {
                thisElement.find('.indicator-progress').hide();
                thisElement.find('.indicator-label').show();
                return false;
            }
        else {
            thisElement.find('.indicator-progress').hide();
            thisElement.find('.indicator-label').show();
            return status;
        }

    });

    function validateDate() {
        if ($('#input_start_date').val() == $('#input_end_date').val()) {
            if ($('#start_time').val() >= $('#end_time').val()) {
                $('#end_time').parent().find('.invalid-feedback').text(' * زمان پایان تخفیف نامعتبر است .');
                $('#end_time').parent().find('.invalid-feedback').show();
                $('#start_time').parent().find('.invalid-feedback').text(' * زمان شروع تخفیف نامعتبر است .');
                $('#start_time').parent().find('.invalid-feedback').show();
                return false;
            }
        } else if ($('#input_start_date').val() > $('#input_end_date').val()) {
            $('#end_date').parent().find('.invalid-feedback').text(' * تاریخ پایان تخفیف نامعتبر است .');
            $('#end_date').parent().find('.invalid-feedback').show();
            return false;
        }
        return true;
    }



});
