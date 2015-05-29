<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Playground</title>
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
        #main-menu .description img {
            max-height: 16px;
        }
        #tools img {
            max-height: 40px;
        }
    </style>
</head>
<body>
<div class="wrapper">
    <h1>Aloha!</h1>

    <p>I'm Joel, and this is a playground for me to spend a little time to experiment with web tools and techniques (both client and server side). I'd generally like to keep these as simple projects &mdash; maybe spend a few hours on each. As now, I have been playing with:</p>

    <div id="tools" class="inline-image">
        {!! $tools !!}
    </div>

    <p>I plan to play with these, and anything else that looks interesting and fun. :-) The full project source is <a href="https://github.com/kumuwai/playground">available on github</a>.</p>

<p><a href="https://travis-ci.org/kumuwai/playground"><img alt="Build Status" src="https://img.shields.io/travis/kumuwai/playground/master.svg" style="max-width:100%;"></a>
<a href="https://coveralls.io/r/kumuwai/playground"><img alt="Coverage Status" src="https://coveralls.io/repos/kumuwai/playground/badge.png?branch=master" style="max-width:100%;"></a>
<a href="https://scrutinizer-ci.com/g/kumuwai/playground"><img alt="Code Quality" src="https://img.shields.io/scrutinizer/g/kumuwai/playground.svg" style="max-width:100%;"></a>
<a href="https://github.com/kumuwai/playground/blob/master/LICENSE.md"><img alt="License" src="https://img.shields.io/badge/license-MIT-blue.svg" style="max-width:100%;"></a></p>

    <div id="main-menu">
        @foreach($projects as $project)
            <div class="menu-item">
                <div class="name"><a href="/{{$project->slug}}">{{$project->name}}</a></div> 
                <div class="description">{{$project->description}} {!! $project->tools !!}</div>
            </div>
        @endforeach
    </div>

</div><!-- .wrapper -->

</body>
</html>
