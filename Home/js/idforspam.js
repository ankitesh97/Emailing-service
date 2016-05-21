$(document).ready(function(){
    $('.spamlistclass').on('click', 'a', function() {
        var id = $(this).closest('li').attr('id');
        window.location.href = "http://localhost:80/Finalwelcomepage/expandedspam.php?id=" + id;
    })
})