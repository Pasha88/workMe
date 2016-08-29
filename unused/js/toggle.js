$(document).ready(function() {
        $('#messageFirst').fadeIn('slow');
    }
);



$('#toggle_message').click(function () {
    var value = $('#toggle_message').attr('value');
    $('#message').toggle('fast');

    if (value == 'Скрыть') {
        $('#toggle_message').attr('value', 'Показать');
    }
    else if (value == 'Показать') {
        $('#toggle_message').attr('value', 'Скрыть');
        }
    });

$('#paragraph').click(function() {
    $('#paragraph').hide();
});

