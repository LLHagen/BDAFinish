const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
let productionSourceMaps = false;

mix.js('resources/js/index.js', 'public/js/app.js')
    .react()
    .sass('resources/sass/app.scss', 'public/css');

mix.sourceMaps(productionSourceMaps, 'source-map');

mix.copyDirectory('resources/icon', 'public/icon');

mix.copyDirectory('vendor/tinymce/tinymce', 'public/js/tinymce');
