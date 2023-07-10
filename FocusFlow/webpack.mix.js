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

 mix.styles([
    'resources/css/google-fonts.css',
    'resources/lib/font-awesome/css/all.css',
    'resources/lib/font-awesome/css/v4-shims.css',

    'resources/css/nucleo-icons.css',
    'resources/css/nucleo-svg.css',
    'resources/css/soft-ui-dashboard.css',
    'resources/lib/dropzone/dropzone.css',
    'resources/lib/fancybox/fancybox.css',
    'resources/lib/flatpickr/flatpickr.min.css',

    'resources/lib/fullcalendar/main.min.css',
    'resources/sass/app.scss',
    

], 'public/css/app.css');

mix
    .copy(
        'node_modules/@fortawesome/fontawesome-free/webfonts',
        'public/webfonts'
    );

mix.scripts([
    'resources/js/jquery.min.js',
    'resources/js/bootstrap.min.js',
    'resources/js/popper.min.js',
    'resources/js/soft-ui-dashboard.js',
    'resources/lib/dropzone/dropzone.js',
    'resources/lib/fancybox/fancybox.umd.js',
    'resources/lib/flatpickr/flatpickr.js',
    'node_modules/@fortawesome/fontawesome-free/js/all.js',
    'resources/lib/fullcalendar/main.min.js',


    'resources/lib/masonry.pkgd.min.js',
],'public/js/app.js')