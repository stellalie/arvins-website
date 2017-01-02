jQuery(document).ready(function($) {
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
        var videos = $('[id^=youtube-]');
        videos.each(function () {
            var url = $(this).attr('src');
            $(this).attr('src', '');
            $(this).attr('src', url);
        });
    });
});