let mix = require('laravel-mix');

mix.sass('./sass/app.scss', './dist/css/style.css').options({
    processCssUrls: false, // Prevent Mix from modifying URL paths in CSS
}).minify('./dist/css/style.css'); // Minify the compiled CSS;

// NOW run npx mix