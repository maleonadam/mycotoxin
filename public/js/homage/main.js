// sticky navbar
$(window).on("scroll", function() {
    var scrollPos = $(window).scrollTop();
    if (scrollPos > 0) {
        $(".mynav").addClass("sticky");
    } else {
        $(".mynav").removeClass("sticky");
    }
});
