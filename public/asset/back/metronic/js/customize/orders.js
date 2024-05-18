$(document).ready(function () {

    getCities(0);
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

    $('#submit_filter').click(function () {
        if (validateFilter()) {
            $(this).find('.text').hide();
            $(this).find('.spinner').show();
            setFilter(1, true);
        }
    });

    function validateFilter() {
        if (!$('#filter_div').find('input[type=checkbox]').is(':checked'))
            if ($('input#filter_3').is(':checked') && $('input#filter_4').is(':checked')) {
                var start_date = $('#start_date').attr('data-gdate');
                var end_date = $('#end_date').attr('data-gdate');
                if (start_date > end_date) {
                    showToast('تاریخ شروع از تاریخ پایان بیشتر است.', true);
                    return false;
                }
            }
            else
                showToast('همه سفارشات بازیابی میشود.', false);
        return true;
    }

    $('#typeDiv').add('#stateDiv').add('#cityDiv').add('#startDateDiv').add('#endDateDiv').add('#sendTypeDiv').click(function () {
        $(this).parent().find('input[type=checkbox]').prop('checked', true);
    });

    $(document).on('click', '.pagination a', function (event) {
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        event.preventDefault();
        var myurl = $(this).attr('href');
        var page = $(this).attr('href').split('page=')[1];

        $("#table").empty().html(`
        <div class="row container">
            <div class="text-center" style="margin: 1rem 0.5rem;font-size: 1.5rem;">
                <span class="text">درحال دریافت  اطلاعات ، لطفا شکیبا باشید .... </span>
                <span class="spinner spinner-border spinner-border-sm align-middle ms-2" style="display:inline-block"></span>
            </div>
        </div>
        `);

        setFilter(page, false);
    });

    function setFilter(page, isFilter) {
        var status_id = null, state_id = null, city_id = null, start_date = null, end_date = null, send_type_id = null;
        if ($('input#filter_0').is(':checked'))
            status_id = $('#type').val();
        if ($('input#filter_1').is(':checked'))
            state_id = $('#state').val();
        if ($('input#filter_2').is(':checked'))
            city_id = $('#city').val();
        if ($('input#filter_3').is(':checked'))
            start_date = $('#start_date').attr('data-gdate');
        if ($('input#filter_4').is(':checked'))
            end_date = $('#end_date').attr('data-gdate');
        if ($('input#filter_5').is(':checked'))
            send_type_id = $('#send_type').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'post',
            url: filterUrl + '?page=' + page,
            data: { 'status_id': status_id, 'state_id': state_id, 'city_id': city_id, 'start_date': start_date, 'end_date': end_date, 'send_type_id': send_type_id },
            success: function (data) {
                $('#table').html(data);
                KTMenu.createInstances();
                if (isFilter) {
                    $('#submit_filter').find('.text').show();
                    $('#submit_filter').find('.spinner').hide();
                }
            },
            error: function (e) {
                console.log(e);
                if (isFilter) {
                    $('#submit_filter').find('.text').show();
                    $('#submit_filter').find('.spinner').hide();
                }
            }
        });
    }
});
