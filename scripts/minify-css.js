const CleanCSS = require("clean-css");
const {walk} = require('./utils');
const fs = require('fs');


walk('./assets/css', (path) => {
    if (path.endsWith('.css')) {
        const minified = new CleanCSS().minify(fs.readFileSync(path, 'utf8'))
        if (minified.styles) {
            fs.writeFileSync(path, minified.styles)
        }
    }
});
