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
    {!! css('app') !!}
@show
@yield('css')
<body>

@include('base::navbar')

<div class="wrapper" style="padding-top: 50px;">

    @section('page-title')
        <h1 id="page-title"><a href="/{{$project->slug}}/">{{$project->title}} - {{$project->description}}</a> {!! $project->tools !!}</h1>
    @show
    
    @yield('notes')

    <hr>

    @yield('content')
</div>

@section('master-js')
    {!! js('jquery') !!}
    {!! js('bootstrap') !!}
@show
@yield('js')

</body>
</html>