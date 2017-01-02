jQuery(document).ready(function($) {
    var name = 'inflatality';

    // Stop the carousel from auto move
    $('#' + name).carousel({
        interval: 3000
    });

    // Handles the carousel thumbnails
    $('[id^=thumb-' + name + '-]').click(function () {
        var id = this.id.substr(this.id.lastIndexOf("-") + 1);
        $('#' + name).carousel(parseInt(id));

        // Stop all youtube videos on click
        var videos = $('[id^=youtube-]');
        videos.each(function (target) {
            var url = $(this).attr('src');
            $(this).attr('src', '');
            $(this).attr('src', url);
        });
    });
});