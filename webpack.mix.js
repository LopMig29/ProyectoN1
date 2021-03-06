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

mix.disableSuccessNotifications();
mix.js('resources/js/app.js', 'public/js').vue();
mix.sass('resources/sass/app.scss', 'public/css');

mix.js('resources/js/students.js', 'public/js').vue();
mix.postCss('resources/css/students.css', 'public/css');

mix.js('resources/js/employees.js', 'public/js').vue();
mix.postCss('resources/css/employee.css', 'public/css');
