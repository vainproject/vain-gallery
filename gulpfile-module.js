var scripts_include = [
    './node_modules/blueimp-gallery/js/blueimp-gallery.min.js',
    './node_modules/blueimp-gallery/js/blueimp-gallery-fullscreen.js',
    './node_modules/blueimp-gallery/js/blueimp-gallery-indicator.js',
    './node_modules/blueimp-gallery/js/blueimp-gallery-video.js',
    './node_modules/blueimp-gallery/js/blueimp-gallery-vimeo.js',
    './node_modules/blueimp-gallery/js/blueimp-gallery-youtube.js',
    './node_modules/blueimp-gallery/js/jquery.blueimp-gallery.min.js',
    './node_modules/masonry-layout/dist/masonry.pkgd.min.js'
];

var styles_include = [
    './node_modules/vain-gallery/resources/assets/less/gallery.less'
];

module.exports = function (mix) {

    mix.less(styles_include, 'public/static/css/gallery.css', './');

    //mix.browserify('./node_modules/vain-gallery/resources/assets/js/main.js', 'public/static/js/gallery-bundle.js');

    mix.scripts(scripts_include, 'public/static/js/gallery.js', './');
};

