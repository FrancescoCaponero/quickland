jQuery(document).ready(function($) {
    let loaderBar = $('#loader-bar');

    // Function to hide the loader and loading bar
    function hideLoader() {
        $('#loader-wrapper').fadeOut();
    }

    // Initialize the loading bar width
    let loadingProgress = 0;

    // Increase the loading bar width in steps (adjust as needed)
    let loadingInterval = setInterval(function() {
        loadingProgress += 1; // Increase the loading progress
        loaderBar.css('width', loadingProgress + '%'); // Set the loading bar width

        if (loadingProgress >= 100) {
            clearInterval(loadingInterval); // Stop when fully loaded
            hideLoader(); // Hide the loader
        }
    }, 10); // Adjust the interval for smoother or faster loading
});
