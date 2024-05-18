$('#state').add('.state').on('change', function () {
    let element = null;
    let attr = $(this).attr('data-element')
    if (typeof attr !== 'undefined' && attr !== false)
        element = $(this).attr('data-element');
    getCities(0, element);
});

function getCities(city_id, element = null) {
    let state_id;
    if (element)
        state_id = $("#" + element).find('#state' + " option:selected").val();
    else
        state_id = $('#state' + " option:selected").val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': token
        },
        type: 'post',
        url: getCitiesUrl,
        data: { 'state_id': state_id },
        success: function (data) {
            if (data.length > 0) {
                if (element)
                    $("#" + element).find('#city').empty();
                else
                    $('#city').empty();
                let optionText, optionValue;
                for (let i = 0; i < data.length; i++) {
                    optionText = data[i]['name'];
                    optionValue = data[i]['id'];

                    if (element)
                        $("#" + element).find('#city').append(`<option value="${optionValue}">
                                ${optionText}
                            </option>`);
                    else
                        $('#city').append(`<option value="${optionValue}">
                                ${optionText}
                            </option>`);
                }
                if (city_id > 0)
                    if (element)
                        $("#" + element).find('select#city option[value=' + city_id + ']').prop('selected', true);
                    else
                        $('select#city option[value=' + city_id + ']').prop('selected', true);
            }
        },
        error: function (e) {
            console.log(e);
        }
    });
}
