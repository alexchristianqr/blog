let mix = require('laravel-mix')

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

mix.copy('node_modules/vue/dist/vue.min.js', 'public/dist/js/vue.min.js')

mix.copyDirectory('node_modules/font-awesome/fonts', 'public/dist/fonts')
mix.copyDirectory('node_modules/social-share-kit/dist/fonts/', 'public/dist/fonts')

mix.styles([
    'node_modules/bootstrap/dist/css/bootstrap.css',
    'node_modules/font-awesome/css/font-awesome.css',
    'node_modules/social-share-kit/dist/css/social-share-kit.css',
    'resources/assets/css/sticky-footer-navbar.css',
    'resources/assets/css/modern-business.css',
    'resources/assets/css/app.css',
], 'public/dist/css/main.css')

mix.js(['resources/assets/js/app.js'], 'public/dist/js/main.js')

