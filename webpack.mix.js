let mix = require('laravel-mix');

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

mix.browserSync({
    files: [
        'app/**/*',
        'public/**/*',
        'resources/views/**/*',
        'resources/lang/**/*',
        'routes/**/*'
    ],
    proxy: 'laravel.test',
    notify: false,
    open: false,
    host: "192.168.10.10",
});

mix.js('resources/assets/js/app.js', 'public/js');
mix.sass('resources/assets/sass/main.scss', 'public/css').sourceMaps();

// Copy lsau-ux over to public folder - contains jquery, bootstrap.js,  popper.js, datatables.js
mix.copy('resources/vendor/LSAU-UX/dist/assets/js/lsau-ux-bundle.min.js', 'public/js/');

// Copy and compress sau-l2-custom javascript to public folder



/*
 |--------------------------------------------------------------------------
 | Copy options
 |--------------------------------------------------------------------------
 */
// Only run these once if needed to be updated
mix.copy('resources/vendor/LSAU-UX/src/assets/fonts/', 'public/fonts/');


/*
 |--------------------------------------------------------------------------
 | Mix Options
 |--------------------------------------------------------------------------
 */
mix.options({
    processCssUrls: false, // Stops Mix rewriting SAU font paths
});