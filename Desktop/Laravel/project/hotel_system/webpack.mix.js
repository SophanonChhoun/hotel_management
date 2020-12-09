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

mix.js('resources/js/axios.js', 'public/dist/js')
    .js('resources/js/app.js','public/dist/js')
    .js('resources/js/hotel/create.js','public/dist/js/hotel')
    .js('resources/js/hotel/edit.js','public/dist/js/hotel')
    .js('resources/js/room_type/create.js','public/dist/js/room_type')
    .js('resources/js/room_type/edit.js','public/dist/js/room_type')
    .sass('resources/sass/app.scss', 'public/css');
