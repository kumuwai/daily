@extends('layouts.main')

@section('notes')
    <p>Part 1: This is some basic exploration with flexboxes</p>
@stop

@section('content')

    <div id="demo" class="container-fluid">

        <h4>Space-around in container:</h4>
        <div class="space_around entry">
            <ul>
                <li>item 1</li>
                <li>item 2</li>
                <li>item 3</li>
                <li>item 4</li>
            </ul>
        </div>

        <h4>Flex in items:</h4>
        <div class="item_flex entry">
            <ul>
                <li>item 1</li>
                <li>item 2</li>
                <li>item 3</li>
                <li>item 4</li>
            </ul>
        </div>

        <h4>Flex in items with text-align:center</h4>
        <div class="item_flex entry" style="text-align:center;">
            <ul>
                <li>item 1</li>
                <li>item 2</li>
                <li>item 3</li>
                <li>item 4</li>
            </ul>
        </div>
        
        <h4>Flex in items where item 1 has flex:3</h4>
        <div class="item_flex entry">
            <ul>
                <li style="flex:3">item 1</li>
                <li>item 2</li>
                <li>item 3</li>
                <li>item 4</li>
            </ul>
        </div>

        <h4>Fixed first column, flex second</h4>
        <div class="item_flex entry">
            <ul>
                <li style="width:120px; flex:0 0 auto">item 1</li>
                <li style="width:100%; flex:0 1 auto">item 2</li>
            </ul>
        </div>

        <h4>Wrapping items:</h4>
        <div class="item_wrap entry">
            <div>item 1</div>
            <div>item 2</div>
            <div>item 3</div>
            <div>item 4</div>
            <div>item 5</div>
        </div>

        <h4>Centering in a parent object</h4>
        <div class="parent entry">
            <div class="child">
        </div>

    </div><!-- /.container -->
@stop

@section('css')
    <style type="text/css">
        .entry {
            background: rgba(140, 200, 200, .6);
            border: 1px solid green;
            padding: 20px;
        }
        .entry ul {
            list-style-type: none;
            padding-left:  0;            
            display: flex;
        }
        .entry li {
            border: 1px dashed red;
            background: rgba(140,200,200,.8);
        }

        .space_around ul {
            justify-content: space-around;
        }

        .item_flex li {
            flex: 1;
        }

        .item_wrap {
            display: flex;
            flex-direction: row;
            flex-flow: row wrap;
        }
        .item_wrap div {
            flex: 0 0 auto;
            flex-grow: 1;
            width: 40%;
            height: 5em;
            margin: 1em;
            border: 1px dashed red;
            background: rgba(140,200,200,.8);
        }

        .parent {
            height: 300px;
            display: flex;
        }

        .child {
            border: 1px dashed red;
            background: rgba(140,200,200,.8);
            width: 100px;
            height: 100px;
            margin: auto;
        }


    </style>
@stop
