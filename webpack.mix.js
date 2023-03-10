const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js');

mix.sass('resources/sass/web/app.scss', 'public/css')
    .options({
        processCssUrls: false,
    });

mix.sass('resources/sass/bash/bash.scss', 'public/css')
.sourceMaps()

mix.sass('resources/sass/bash/print.scss', 'public/css')