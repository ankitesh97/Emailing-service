$(document).ready(function(){
    $('.sentlistclass').on('click', 'a', function() {
        var id = $(this).closest('li').attr('id');
        window.location.href = "http://localhost:80/Finalwelcomepage/demosent.php?id=" + id;
    })
})