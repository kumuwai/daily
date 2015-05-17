var elixir = require('laravel-elixir');

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
    ], 'public/js/angular.js');
    // .scripts(['forum.js', 'threads.js'], 'public/js/forum.js');
});


