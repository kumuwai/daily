@extends('layouts.main')

@section('notes')
    <p>Part 6: This shows a basic component</p>
@stop

@section('content')

    <div id="demo" class="container-fluid">

        <p>Counters:</p>
        <counter subject="likes">Hello, world</counter>
        <counter subject="dislikes"></counter>

    </div><!-- /.container -->


    <template id='counter-template'>
        <div>
            <button @click="incrementCount">
                @{{ subject }}: @{{ count }}
            </button>
        </div>
    </template>
@stop

@include('project003::_styles')

@section('js')
    {!! js('vue') !!}

    <script type="text/javascript">

        Vue.component('counter', {
            template: '#counter-template',
            data: function() {
                return { count: 0 };
            },
            props: ['subject'],
            methods: {
                incrementCount: function() {
                    this.count += 1;
                }
            }
        });

        new Vue({
            el: '#demo',
        });

    </script>
@stop
