var _ = require('lodash');

var scripts = [
    './node_modules/blueimp-gallery/js/blueimp-gallery.min.js',
    './node_modules/blueimp-gallery/js/blueimp-gallery-fullscreen.js',
    './node_modules/blueimp-gallery/js/blueimp-gallery-indicator.js',
    './node_modules/blueimp-gallery/js/blueimp-gallery-video.js',
    './node_modules/blueimp-gallery/js/blueimp-gallery-vimeo.js',
    './node_modules/blueimp-gallery/js/blueimp-gallery-youtube.js',
    './node_modules/blueimp-gallery/js/jquery.blueimp-gallery.min.js'
];

var styles = [
    './src/Gallery/Resources/assets/less/gallery.less'
];

// TODO check if we really want to merge those files into the main
// app.css/app.js or if it would be possible to generate each modules
// assets by its own demise
module.exports = function (mix, scripts_include, styles_include) {

    // add our scripts to the main scripts array
    _.each(scripts, function (script) {
        scripts_include.push(script);
    });

    // add our styles to the main styles array
    _.each(styles, function (script) {
        styles_include.push(script);
    });
};

