var path = './vendor/vainproject/vain-gallery/';

var scripts_include = [
    'node_modules/blueimp-gallery/js/blueimp-gallery.min.js',
    'node_modules/blueimp-gallery/js/blueimp-gallery-fullscreen.js',
    'node_modules/blueimp-gallery/js/blueimp-gallery-indicator.js',
    'node_modules/blueimp-gallery/js/blueimp-gallery-video.js',
    'node_modules/blueimp-gallery/js/blueimp-gallery-vimeo.js',
    'node_modules/blueimp-gallery/js/blueimp-gallery-youtube.js',
    'node_modules/blueimp-gallery/js/jquery.blueimp-gallery.min.js'
];

var copy

module.exports = function (compile_scripts) {
    scripts_include.forEach(function (script) {
        compile_scripts.push(path + script)
    });
};

