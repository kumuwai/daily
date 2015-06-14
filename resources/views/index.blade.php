<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Playground</title>
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <style type="text/css">
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

    <p>I plan to play with these, and anything else that looks interesting and fun. :-)</p>

    @include('base::shields')

    <div id="project-menu">
        <h2>Projects</h2>
        @foreach($projects as $project)
            <div class="menu-item">
                <div class="name"><a href="/{{$project->slug}}">{{$project->title}}</a></div> 
                <div class="description">{{$project->description}} {!! $project->tools !!}</div>
            </div>
        @endforeach
    </div>

</div><!-- .wrapper -->

</body>
</html>
