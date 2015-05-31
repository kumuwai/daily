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
    <h1>
        @if( $tool )
            <a href="{{$tool[$id]['url']}}">
                {{ $tool[$id]['caption'] }}

                <figure style="display:inline-block">
                    <img style="max-height: 30px" src="/img/logos/{{$tool[$id]['file']}}">
                </figure>

            </a>
        @else
            {{ $id }}
        @endif        
    </h1>
@stop

@section('content')

    <div id="project-menu">

    @if( ! $projects->count() )
        {{ "No projects use this tool" }}
    @else
        @foreach($projects as $project)
            <div class="menu-item">
                <div class="name"><a href="/{{$project->slug}}">{{$project->title}}</a></div> 
                <div class="description">{{$project->description}} {!! $project->tools !!}</div>
            </div>
        @endforeach
    @endif

    </div>

@stop
