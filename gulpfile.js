/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */
 
var elixir = require('laravel-elixir');

var bower_source = 'resources/assets/bower/';

require('laravel-elixir-vueify');

elixir(function(mix) {
    mix.less('app.less');
    mix.browserify('main.js');
});


