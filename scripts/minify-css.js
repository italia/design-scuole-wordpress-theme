const CleanCSS = require("clean-css");
const {walk} = require('./utils');
const fs = require('fs');

const CSS_ASSETS = './assets-src/css'

if (fs.existsSync(CSS_ASSETS)) {
    walk(CSS_ASSETS, (path) => {
        if (path.endsWith('.css')) {
            const minified = new CleanCSS().minify(fs.readFileSync(path, 'utf8'))
            if (minified.styles) {
                fs.writeFileSync(path.replace('assets-src', 'assets'), minified.styles)
            }
        }
    });
}
