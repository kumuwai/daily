<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
            Playground - {{$project->description}}
        @show
    </title>
</head>
@section('master-css')
    <link rel="stylesheet" type="text/css" href="/css/app.css">
@show
@yield('css')
<body>

@include('base::navbar')

<div class="wrapper" style="padding-top: 50px;">

    @section('page-title')
        <h1 id="page-title"><a href="/{{$project->slug}}/">{{$project->title}} - {{$project->description}}</a> {!! $project->tools !!}</h1>
    @show
    
    @yield('notes')

    @include('base::shields')

    @yield('content')
</div>

@section('master-js')
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
@show
@yield('js')

</body>
</html>