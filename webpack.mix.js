// webpack.mix.js

let mix = require('laravel-mix');

mix
    .sass('assets/css/martino.scss', 'assets/css')
    .sass('assets/css/martino-carousel.scss', 'assets/css')
    .options({
        watchOptions: {
            ignored: /node_modules/
        }
    });

if (process.env.MIX_NOTIFICATIONS == 'false') {
    mix.disableNotifications();
}