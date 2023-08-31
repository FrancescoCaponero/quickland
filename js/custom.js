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

    const hamburger = $("#hamburger");
    const mobileMenu = $(".primary-menu");
    const hamToggleOpen = $(".ham #open");
    const hamToggleClose = $(".ham #close");

    // Initially, set the close icon to be hidden
    hamToggleClose.hide();

    // Toggle the mobile menu when the hamburger icon is clicked
    hamburger.on("click", function() {
        mobileMenu.toggleClass("active");
        hamToggleOpen.toggle();
        hamToggleClose.toggle();
    });

    $(".primary-menu a").on("click", function() {
        mobileMenu.removeClass("active");
        hamToggleOpen.show();
        hamToggleClose.hide();
    });
});
