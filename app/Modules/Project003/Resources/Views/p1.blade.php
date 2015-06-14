@extends('layouts.main')

@section('notes')
    <p>Part 1: This is a basic 2-way binding between data and an input. It will automatically reset the text block every 5 seconds.</p>
@stop

@section('content')

    <div id="demo" class="container-fluid">

            <input type="text" v-model="static" placeholder="static content">

            <input type="text" v-model="dynamic" placeholder="dynamic content">

            <pre><code class="json">@{{ $data | json }}</code></pre>

    </div><!-- /.container -->
@stop

@include('project003::_styles')

@section('js')
    {!! js('vue') !!}

    <script type="text/javascript">
        new Vue({

            el: '#demo',

            data: {
                'static': 'default',
                'dynamic': 'default',
            },

            ready: function() {
                var vue = this;
                setInterval(function(){
                    vue.dynamic = 'reset';
                }, 5000);
            }

        });
    </script>
@stop
