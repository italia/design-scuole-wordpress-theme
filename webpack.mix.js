// webpack.mix.js
let mix = require('laravel-mix');

mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.s[ac]ss$/i,
                use: [
                    {
                        loader: "sass-loader",
                        options: {
                            additionalData: [
                                "$env: " + process.env.NODE_ENV + ";",
                                "$debug-links: " + !!process.env.DEBUG_LINKS + ";",
                            ].join('\n')
                        },
                    },
                ],
            },
        ],
    }
})

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