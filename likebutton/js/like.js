function like_add(member_id) {
    var rating = parseInt($('#rating').val());
    alert(rating);
    $.ajax({
        url:        'ajax/like_add.php',
        type:       'POST',
        dataType:   'json',
        data:       {
             member_id:member_id,
             rating: rating },
        success:    function(data) {
            alert("Success!");
            like_get(member_id);
        }
    });

  /*
    $.post('ajax/like_add.php', {member_id:member_id}, function(data) {
         // {success  - херов саксесс) почему-то не работал!!!)
       data.toString();
            if(data.length == 9) {
                var rating = parseInt($('#rating').val());
                alert(rating);
                $.ajax({
                    url:        'ajax/like_add.php',
                    type:       'POST',
                    dataType:   'json',
                    data:       { value: rating },
                    success:    function(data) {
                        alert("Success!");
                    }
                });
            like_get(member_id);
        } else {
            alert("You`ve already liked this");
       }
    });*/
}

function like_get(member_id) {
    $.post('ajax/like_get.php', {member_id:member_id}, function(data) {
       $('#member_'+member_id+'_likes').text(data); //тут ошибка не доходит, еще раньше
});
}



