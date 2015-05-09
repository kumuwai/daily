<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daily Practice</title>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <style type="text/css">
        #main-menu {
            display:table;
        }
        #main-menu .menu-item {
            display: table-row;
        }
        #main-menu .name,
        #main-menu .description {
            display: table-cell;
            padding-right: 10px;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <h1>Aloha!</h1>

    <p>I'm Joel, and this is a playground for me to spend a little time to experiment with web tools and techniques (both client and server side). I'd generally like to keep these as simple projects--maybe spend an hour or two on each. As of right now, I plan to be playing with:</p>

    <div class="inline-image">
        {!! $tools !!}
    </div>

    <p>... and anything else that looks interesting and fun. :-) The full project source is <a href="https://github.com/kumuwai/daily">available on github</a>.</p>

    <div id="main-menu">
        @foreach($days as $day)
            <div class="menu-item">
                <div class="name"><a href="/{{$day->slug}}">{{$day->name}}</a></div> 
                <div class="description">{{$day->description}} {!! $day->tools !!}</div>
            </div>
        @endforeach
    </div>

</div><!-- .wrapper -->

</body>
</html>
