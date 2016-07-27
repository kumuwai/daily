@extends('layouts.main')

@section('notes')
    <p>Part 10: This shows an alert component built with Browserify (based on <a href="https://laracasts.com/series/learning-vue-step-by-step">Laracasts: Learning Vue Step by Step, Lesson 13</a>).</p>
@stop

@section('content')

    <div id="app" class="container-fluid">

        <alert type="success">Successful Alert Box</alert>
        <alert type="success">Another Alert Box</alert>
        <alert type="warning">Another Alert Box</alert>
        <alert type="error">Another Alert Box</alert>

    </div>

@stop

@section('js')
    {!! js('main') !!}
@stop