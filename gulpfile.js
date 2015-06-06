var elixir = require('laravel-elixir');

var bower_source = 'resources/assets/bower/';

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

elixir(function(mix) {
    mix.less('app.less');
});

elixir(function(mix) {
    mix
    .scripts([
        '/../bower/angular/angular.js',
        '/../bower/angular-resource/angular-resource.js',
        '/../bower/angular-route/angular-route.js',
    ], 'public/js/angular.js')
    .copy(bower_source + 'jquery/dist/*.*', 'public/js')
    .copy(bower_source + '/bootstrap/dist/js/*.*', 'public/js')
    .copy(bower_source + '/vue/dist/*.js', 'public/js')
    .copy(bower_source + '/highlight', 'public/vendor/highlight')
    ;
    // .scripts(['forum.js', 'threads.js'], 'public/js/forum.js');
});


