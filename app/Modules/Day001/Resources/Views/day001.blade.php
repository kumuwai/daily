<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daily Practice</title>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
<div class="wrapper">
    <h1>Aloha!</h1>

    <p>I'm Joel, and this is a playground for me to spend a little time to experiment with web tools and techniques (both client and server side). I'd generally like to keep these as simple projects--maybe spend an hour or two on each. As of right now, I plan to be playing with:</p>

    <div class="inline-image">
        @include('day001::image', ['url'=>'http://laravel.com', 'file'=>'logo_laravel.png','caption'=>'Laravel 5'])
        @include('day001::image', ['url'=>'https://phpunit.de', 'file'=>'logo_phpunit.gif','caption'=>'phpunit'])
        @include('day001::image', ['url'=>'https://codeception.com', 'file'=>'logo_codeception.png','caption'=>'codeception'])
        @include('day001::image', ['url'=>'http://getbootstrap.com', 'file'=>'logo_bootstrap.svg', 'caption'=>'bootstrap'])
        @include('day001::image', ['url'=>'http://jquery.com', 'file'=>'logo_jquery.svg', 'caption'=>'jquery'])
        @include('day001::image', ['url'=>'http://jqueryui.com', 'file'=>'logo_jqueryui.svg', 'caption'=>'jquery ui'])
        @include('day001::image', ['url'=>'https://angularjs.org', 'file'=>'logo_angular.svg', 'caption'=>'angularjs'])
        @include('day001::image', ['url'=>'http://bower.io', 'file'=>'logo_bower.png', 'caption'=>'bower'])
        @include('day001::image', ['url'=>'http://gulpjs.com', 'file'=>'logo_gulp.png', 'caption'=>'gulp'])
        @include('day001::image', ['url'=>'http://lesscss.org', 'file'=>'logo_less.png', 'caption'=>'less'])
        @include('day001::image', ['url'=>'https://stripe.com', 'file'=>'logo_stripe.png', 'caption'=>'stripe'])
    </div>

    <p>... and anything else that looks interesting and fun. :-) The full project source is available on github.</p>

</div><!-- .container -->


</body>
</html>
