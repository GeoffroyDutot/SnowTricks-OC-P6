function scrollToTop() {
    $(document).ready(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $("#scroll-top").fadeIn();
            } else {
                $("#scroll-top").fadeOut();
            }
        });
        $(".scrollup").click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });
    });
    document.getElementById("scroll-top").addEventListener('click', function () {
        window.scroll({top: 0, left: 0, behavior: "smooth"});
    });
}
function scrollToTricks() {
    const y = document.getElementById("tricks").getBoundingClientRect().top + window.scrollY;
    document.getElementById("scroll-tricks").addEventListener('click', function () {
        window.scroll({top: y, behavior: "smooth"});
    });
}
scrollToTop();
scrollToTricks();
