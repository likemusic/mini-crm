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

mix
    .copy('resources/js/order.js', 'public/js')
    .js('resources/js/dashboard.js', 'public/js')
    // .js('resources/js/app.js', 'public/js')
    // .js('resources/js/test.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps()
;

/* Orchid mix config start */

if (!mix.inProduction()) {
    mix
        .webpackConfig({
            devtool: 'source-map',
        })
        .sourceMaps();
}else{
    mix.options({
        clearConsole: true,
        terser: {
            terserOptions: {
                compress: {
                    drop_console: true,
                },
            },
        },
    });
}

mix
    .copy('./node_modules/orchid-icons/src/fonts/', 'public/resources/orchid/fonts')
    .copyDirectory('./node_modules/tinymce/plugins', 'public/resources/orchid/js/tinymce/plugins')
    .copyDirectory('./node_modules/tinymce/themes', 'public/resources/orchid/js/tinymce/themes')
    .copyDirectory('./node_modules/tinymce/skins', 'public/resources/orchid/js/tinymce/skins')
    .sass('resources/sass/orchid/app.scss', 'public/resources/orchid/css/orchid.css', {
        implementation: require('node-sass')
    })
    .options({
        processCssUrls: false
    })
    .js('resources/js/orchid/app.js', 'public/resources/orchid/js/orchid.js')
    .extract([
        'stimulus', 'turbolinks', 'stimulus/webpack-helpers',
        'jquery', 'popper.js', 'bootstrap',
        'dropzone', 'select2', 'cropperjs', 'frappe-charts', 'inputmask',
        'simplemde', 'tinymce', 'axios', 'leaflet', 'codeflask', 'stimulus-flatpickr',
        'flatpickr', 'quill', 'codemirror', 'typo-js', 'sortablejs'
    ])
    .autoload({
        jquery: [
            '$', 'window.jQuery', 'jQuery', 'jquery',
            'bootstrap', 'select2'
        ],
    })
    .setPublicPath('public')
    .version();

/* Orchid mix config end */