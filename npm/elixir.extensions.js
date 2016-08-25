var Elixir = require('laravel-elixir');
var path = require('path');
var webpackConfig = require('./webpack.config.js');
require('laravel-elixir-vue');
require('laravel-elixir-webpack-official');

Elixir.extend('bower', function (config, plugins) {
  var self = this;
  var tasks = plugins.map(function (plugin) {
    self.mixins.copy(path.join(config.in, plugin.in), path.join(config.out, plugin.out))
  });
});

Elixir.extend('vue', function (config, plugins) {
  var self = this;
  var tasks = plugins.map( function (plugin) {
    self.mixins.webpack(plugin.name, path.join(config.out, plugin.out), path.join(config.in, plugin.in));
  });
  self.webpack.mergeConfig(webpackConfig);
});