@extends('layouts.main')

@section('notes')
    <p>Part 1: This is some basic exploration with flexboxes</p>
@stop

@section('content')

    <div id="demo" class="container-fluid">

        <div class="first">
            <ul>
                <li>item 1</li>
                <li>item 2</li>
                <li>item 3</li>
                <li>item 4</li>
                <li>item 5</li>
            </ul>
        </div>

    </div><!-- /.container -->
@stop

@section('css')
    <style type="text/css">
        .first ul {
            display: flex;
            list-style-type: none;
            background: rgba(140, 200, 200, .6);
            border: 1px solid green;
        }
        .first li {
            flex: 1;
            border: 1px dashed #ccc;
        }
    </style>
@stop
