const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');

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


mix.js('resources/js/app.js', 'public/js')
		.extract(['alpinejs'])
    .sass('resources/sass/app.scss', 'public/css')
    .options({
    	processCssUrls: false,
    	postCss: [
    		tailwindcss('./tailwind.config.js')
    	]
    })
    .copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts');
/*.copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts')*/

/*Run mix: npm run dev, npm run prod*/