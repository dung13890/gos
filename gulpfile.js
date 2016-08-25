process.env.DISABLE_NOTIFIER = true;
const elixir = require('laravel-elixir');

var plugins = require('./npm/plugins');
var config = require('./npm/config');
require('laravel-elixir-vue');
require('./npm/elixir.extensions');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(mix => {
    mix
    .copy(config.paths.plugins.img.in, config.paths.plugins.img.out)
    .copy(config.paths.plugins.styles.in, config.paths.plugins.styles.out)
    .copy(config.paths.plugins.scripts.in, config.paths.plugins.scripts.out)
    .sass('backend/*.scss', 'public/assets/css/backend/app.css')
    .bower(config.paths.plugins.bower, plugins.bower)
    .vue(config.paths.plugins.vue, plugins.vue)
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

