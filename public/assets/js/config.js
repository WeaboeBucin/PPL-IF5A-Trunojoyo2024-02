

$(document).ready(function() {
    $(window).scroll(function() {
    if($(this).scrollTop() > 50) { 
        $('.navbar').addClass('nav-scrolled');
    } else {
        $('.navbar').removeClass('nav-scrolled');
    }
    });
});



