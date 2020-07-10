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

mix.js('resources/js/datatable.js', 'public/js')
    .js('resources/js/googleTag.js', 'public/js')
    .js('resources/js/user_add_valid.js', 'public/js')
    .js('resources/js/booking.js', 'public/js')
    .js('resources/js/bookingDetailAjax.js', 'public/js');
