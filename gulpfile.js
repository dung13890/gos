process.env.DISABLE_NOTIFIER = true;
var elixir = require('laravel-elixir');
var vueify = require('vueify');
var path = require('path');
var plugins = require('./npm/plugins');
var config = require('./npm/config');
require('./npm/elixir.extensions');
elixir.config.js.browserify.watchify.options.poll = true;

elixir.config.js.browserify.transformers.push({
    name: 'vueify',
    options: {}
});

elixir(function(mix) {
    mix
    .copy(config.paths.plugins.img.in, config.paths.plugins.img.out)
    .copy(config.paths.plugins.styles.in, config.paths.plugins.styles.out)
    .copy(config.paths.plugins.scripts.in, config.paths.plugins.scripts.out)
    .bower(config.paths.plugins.bower, plugins.bower)
    .vue(config.paths.plugins.vue, plugins.vue)
    .sass('backend/*.scss', 'public/assets/css/backend/app.css')
    .styles([
        '../bower/sweetalert/dist/sweetalert.css',
        '../bower/animate.css/animate.min.css',
        '../bower/toastr/toastr.min.css',
        '../bower/bootstrap-toggle/css/bootstrap-toggle.min.css',
        ], 'public/assets/css/backend/plugins.css')

    .styles([
        'backend/common-responsive.css',
        'backend/common.css',
        'backend/support.css',
        ], 'public/assets/css/backend/development.css')

    .scripts([
        'laroute.js',
	    'common.js',
        'defined.js',
	    'server.js',
        'laroute.js',
	    '../bower/jquery-slimscroll/jquery.slimscroll.min.js',
        '../bower/sweetalert/dist/sweetalert.min.js',
        '../bower/toastr/toastr.min.js',
        '../bower/bootstrap-toggle/js/bootstrap-toggle.min.js',
	  ],'public/assets/js/backend/app.js')
    .version([
        'assets/css/backend/app.css',
        'assets/js/backend/app.js',
        'assets/vue/app.js'
    	])
    .browserSync({
        proxy: 'gos.dev'
      });
});
