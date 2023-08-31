jQuery(document).ready(function($) {
    let loaderBar = $('#loader-bar');

    // Function to hide the loader and loading bar
    function hideLoader() {
        $('#loader-wrapper').fadeOut();
    }

    // Function to update the loading progress
    function updateLoadingProgress() {
        loadedImages++;
        loadingProgress = (loadedImages / totalImages) * 100;
        loaderBar.css('width', loadingProgress + '%');
        if (loadedImages >= totalImages) {
            hideLoader();
        }
    }

    // Count the number of images on the page
    let totalImages = $('img').length;
    let loadedImages = 0;

    // If there are no images, hide the loader immediately
    if (totalImages === 0) {
        hideLoader();
    }

    // Function to check if all images are loaded
    function checkImagesLoaded() {
        $('img').each(function() {
            if (this.complete) {
                updateLoadingProgress();
            } else {
                $(this).on('load', function() {
                    updateLoadingProgress();
                });
            }
        });
    }

    // Check if all images are loaded (initial check)
    checkImagesLoaded();
});
