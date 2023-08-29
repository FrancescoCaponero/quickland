jQuery(document).ready(function($) {
     // Add a scroll event listener
     $(window).on('scroll', function() {
        var scroll = $(window).scrollTop();

        // Define a scroll threshold (adjust as needed)
        var scrollThreshold = 100; // Change this value as needed

        // Check if the scroll position is beyond the threshold
        if (scroll >= scrollThreshold) {
            // Add a class to the header to apply the border-bottom
            $('header').addClass('bordered-header');
        } else {
            // Remove the class when scrolling back up
            $('header').removeClass('bordered-header');
        }
    });

    $("a[href^='#']").on('click', function(event) {
        event.preventDefault();
        var target = $(this.hash);
        $('html, body').animate({
            scrollTop: (target.offset().top - 80)
        }, 1000);
    });
});
