let mix = require("laravel-mix");
let fs = require("fs");

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

mix.react("resources/js/app.js", "public/js").sass(
    "resources/sass/app.scss",
    "public/css"
);

// Scripts for specific views
fs.readdirSync("resources/js/views").map(script =>
    mix.react(`resources/js/views/${script}`, "public/js/views")
);

// Stylesheets for specific views
fs.readdirSync("resources/sass/views").map(style =>
    mix.sass(`resources/sass/views/${style}`, "public/css/views")
);
