@extends('layouts.main')

@section('notes')
    <p>This is a test of some basic events.</p>
@stop

@section('content')

    <div id="demo" class="container">

        <input id="input-box" type="text" v-on="
            blur: onBlur,
            focus: onFocus, 

            keydown: onKeyDown,
            keyup: onKeyUp,
            keypress: onKeyPress,

            change: onChange,
            select: onSelect,

            click: onClick,
            dblclick: onDblClick, 
            mousedown: onMouseDown,
            mousemove: onMouseMove,
            mouseout: onMouseOut,
            mouseover: onMouseOver,
            mouseup: onMouseUp
        ">

        <button id="button" v-on="
            blur: onBlur,
            focus: onFocus, 

            keydown: onKeyDown,
            keyup: onKeyUp,
            keypress: onKeyPress,

            change: onChange,
            select: onSelect,

            click: onClick,
            dblclick: onDblClick, 
            mousedown: onMouseDown,
            mousemove: onMouseMove,
            mouseout: onMouseOut,
            mouseover: onMouseOver,
            mouseup: onMouseUp
        ">Button</button>

        <button id="reset" v-on="
            click: doReset
        ">Reset</button>


    <pre><code>@{{ $data | json }}</code></pre>

    </div><!-- /.container -->
@stop

@include('project003::_styles')

@section('js')
    {!! js('vue') !!}

    <script type="text/javascript">
        new Vue({

            el: '#demo',

            data: {
                events: [],
            },

            methods: {
                onBlur: function(e) { 
                    this.setEvent(e, 'Blur'); 
                },
                onFocus: function(e) {
                    this.setEvent(e, 'Focus'); 
                },

                onKeyDown: function(e) { 
                    this.setEvent(e, 'key down: ' + String.fromCharCode(e.which)); 
                },
                onKeyUp: function(e) { 
                    this.setEvent(e, 'key up: ' + String.fromCharCode(e.which)); 
                },
                onKeyPress: function(e) { 
                    this.setEvent(e, 'key press: ' + String.fromCharCode(e.which)); 
                },

                onChange: function(e) {
                    this.setEvent(e, 'Change');
                },
                onSelect: function(e) {
                    this.setEvent(e, 'Select');
                },

                onClick: function(e) {
                    this.setEvent(e, 'Click');
                },
                onDblClick: function(e) {
                    this.setEvent(e, 'DblClick');
                }, 
                onMouseDown: function(e) {
                    this.setEvent(e, 'MouseDown');
                },
                onMouseMove: function(e) {
                    this.setEvent(e, 'MouseMove');
                },
                onMouseOut: function(e) {
                    this.setEvent(e, 'MouseOut');
                },
                onMouseOver: function(e) {
                    this.setEvent(e, 'MouseOver');
                },
                onMouseUp: function(e) {
                    this.setEvent(e, 'MouseUp');
                },

                setEvent: function(e, event) {
                    target = e.target.getAttribute("id");

                    if (this.events.length == 0 || ! this.events[0].includes(event))
                        return this.events.unshift(target + ': ' + event);
                        
                    var found = this.events[0].match(/(\d+)$/);
                    var count = (found) ? parseInt(found[0], 10) + 1 : 0;
                    this.events[0] = target + ': ' + event + ' ' + count;
                },

                doReset: function() {
                    this.events = [];
                }
            }

        });
    </script>
@stop
