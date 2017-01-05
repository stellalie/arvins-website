jQuery(document).ready(function($) {
    // Smooth scrolling
    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });

    // Carousel initialisation
    $('.carousel').each(function () {
        // Stop the carousel from auto move
        $(this).carousel({
            interval: false
        });
    });

    // Handles the carousel thumbnails
    $('[id^=thumb-]').click(function (e) {
        var id = this.id.substr(this.id.lastIndexOf("-") + 1);
        var carouselName = $(e.target).data('carousel-name');
        $('#' + carouselName).carousel(parseInt(id));

        // Stop all youtube videos on click
        // TODO: Don't know why keep flicking
        // var videos = $('[id^=youtube-]');
        // videos.each(function () {
        //     var url = $(this).attr('src');
        //     $(this).attr('src', '');
        //     $(this).attr('src', url);
        // });
    });
});