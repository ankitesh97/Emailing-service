$(document).ready(function(){
    $('.trashlistclass').on('click', 'a', function() {
        var id = $(this).closest('li').attr('id');
        window.location.href = "http://localhost:80/Finalwelcomepage/trash.php?id=" + id;
    })
})