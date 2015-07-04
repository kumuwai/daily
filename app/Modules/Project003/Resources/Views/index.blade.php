@extends('layouts.main')

@section('notes')
    <p>This project contains a variety of sub-projects. I am experimenting with various features and functionality of Vue.js. </p>
@stop

@section('content')

    <div class="project-menu">

        @foreach($pages as $key=>$value)
            <div class="menu-item">
                <div class="name"><a href="/project003/p{{$key}}">Page {{$key}}</a></div> 
                <div class="description">{{$value}}</div>
            </div>
        @endforeach

    </div><!-- #project-menu -->

@stop

