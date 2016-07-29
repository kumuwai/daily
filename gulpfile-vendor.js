// Update vendor files, using:
//
//  bower update
//  gulp --gulpfile gulpfile-vendor.js  
//
var elixir = require('laravel-elixir');

var bower_source = 'resources/assets/bower/';

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
    .copy(bower_source + '/vue-resource/dist/*.js', 'public/js')
    .copy(bower_source + '/highlight', 'public/vendor/highlight')
    .copy(bower_source + '/jplayer/dist', 'public/vendor/jplayer')

    .copy(bower_source + '/animate.css/*.css', 'public/css')
    .copy(bower_source + '/bootstrap/dist/css/*.*', 'public/css')
    ;
    // .scripts(['forum.js', 'threads.js'], 'public/js/forum.js');
});


