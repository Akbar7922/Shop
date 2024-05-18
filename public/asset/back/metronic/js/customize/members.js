// $(document).ready(function(){
members.forEach(element => {
    $('input[type=checkbox]#chk' + element).prop('checked', true);
});

$('input[name=select]').change(function () {
    if ($(this).is(':checked'))
        select($(this));
    else
        deSelect($(this));

    console.log(members);
});

function select(element) {
    if (!members.includes(parseInt(element.val()))) {
        members.push(parseInt(element.val()));
        var current = element.closest('tr');
        $('#members_list').append(`
            <li class="list-group-item" id="mem${element.val()}"><span>${current.attr('data-name')} - ${current.attr('data-mobile')}</span></li>`
        );
    }
}

function deSelect(element) {
    if (members.includes(parseInt(element.val()))) {
        members.splice(members.indexOf(parseInt(element.val())) , 1);
        $('#members_list').find('#mem' + element.val()).remove();
    }
}
// });
