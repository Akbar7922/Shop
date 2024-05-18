$(document).ready(function(){
    $(document).on('click', '.pagination a', function (event) {
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        event.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        var url = $(this).attr('href');

        $("#table").empty().html(`
        <div class="row container">
            <div class="text-center" style="margin: 1rem 0.5rem;font-size: 1.5rem;">
                <span class="text">درحال دریافت  اطلاعات ، لطفا شکیبا باشید .... </span>
                <span class="spinner spinner-border spinner-border-sm align-middle ms-2" style="display:inline-block"></span>
            </div>
        </div>
        `);

        getData(url);
    });

    function getData(url) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': token
            },
            type: 'get',
            url: url ,
            success: function (data) {
                // console.log(data)
                $('#table').html(data);
            },
            error: function (e) {
                console.log(e);
            }
        });
    }

});
