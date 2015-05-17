<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
            Daily Practice
        @stop
    </title>
</head>
<link rel="stylesheet" type="text/css" href="/css/app.css">
@yield('css')
<body>

<nav id="main-menu" class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="/">Home</a>
    </div>
  </div>
</nav>

<div class="wrapper" style="padding-top: 50px;">

    <h1 id="page-title"><a href="/{{$day->slug}}/">{{$day->title}}</a> {!! $day->tools !!}</h1>

    @yield('notes')

    <p><a href="https://github.com/kumuwai/daily/app/Modules/{{$day->name}}">Source code</a> for this project is available on github.</p>

    @yield('content')
</div>

@yield('js')
</body>
</html>