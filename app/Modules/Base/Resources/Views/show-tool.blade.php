@extends('layouts.main')

@section('title')
    Playground - 
    @if( $tool )
        {{ $tool[$id]['caption'] }}
    @else
        {{ $id }}
    @endif
@stop

@section('page-title')
@stop

@section('content')

    @if( ! $projects->count() )
        <h1>{{$id}}</h1>
        {{ "No projects use this tool" }}
    @else
        <h1>
            <a href="{{$tool[$id]['url']}}">
                {{ $tool[$id]['caption'] }}

                <figure style="display:inline-block">
                    <img style="max-height: 30px" src="/img/logos/{{$tool[$id]['file']}}">
                </figure>
            </a>
        </h1>
        <h3>These projects demonstrate {{$tool[$id]['caption']}}:</h3>
        <div id="project-menu" class="project-menu">
        @foreach($projects as $project)
            <div class="menu-item">
                <div class="name"><a href="/{{$project->slug}}">{{$project->title}}</a></div> 
                <div class="description">{{$project->description}} {!! $project->tools !!}</div>
            </div>
        @endforeach
        </div>
    @endif

@stop
