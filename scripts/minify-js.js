const UglifyJS = require("uglify-js");
const {walk} = require('./utils');
const fs = require('fs');


walk('./assets/js', (path) => {
    if (path.endsWith('.js')) {
        const minified = UglifyJS.minify(fs.readFileSync(path, 'utf8'))
        if (minified.code) {
            fs.writeFileSync(path, minified.code)
        }
    }
});
