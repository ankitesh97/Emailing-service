$(document).ready(function(){
    $('.starlistclass').on('click', 'a', function() {
        var id = $(this).closest('li').attr('id');
        window.location.href = "http://localhost:80/Finalwelcomepage/viewstarred.php?id=" + id;
    })
})