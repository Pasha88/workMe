function like_add(member_id) {
    $.post('ajax/like_add.php', {member_id:member_id}, function(data) {
         // {success  - херов саксесс) почему-то не работал!!!)
        data.toString();
            if(data.length == 9) {
            like_get(member_id);
        } else {
            alert("You`ve already liked this");
       }
    });
}

function like_get(member_id) {
    $.post('ajax/like_get.php', {member_id:member_id}, function(data) {
       $('#member_'+member_id+'_likes').text(data); //тут ошибка не доходит, еще раньше
});
}



