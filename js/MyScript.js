$("#button").click(function(e) {
    e.preventDefault();
    $('html, body').animate({
        scrollTop: $("#news").offset().top
    }, 2000);
});