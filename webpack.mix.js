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

//Application JS sources and CSS
mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

//Material Design Icons
mix.copy('node_modules/@mdi/font/css/materialdesignicons.min.css', 'public/css/materialdesignicons.min.css');
mix.copy('node_modules/@mdi/font/fonts', 'public/fonts');

//Copy TinyMCE dependencies into the public folder
mix.copy('node_modules/tinymce/skins', 'public/tinymce/skins');
mix.copy('node_modules/tinymce/themes', 'public/tinymce/themes');
mix.copy('node_modules/tinymce/plugins', 'public/tinymce/plugins');

//Copy icons and CSS files of JsTree's themes
mix.copy('node_modules/jstree/dist/themes', 'public/jstree/themes');
