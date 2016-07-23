@extends('layouts.main')

@section('notes')
    <p>Part 2: This is a basic list. We can also add items to the list.</p>
@stop

@section('content')

    <div id="demo" class="container-fluid">

        <div class="col-sm-12">
            <h3>List contents</h3>
            <ul>
                <li v-for="name in names">@{{ name }}</li>
            </ul>
        </div>

        <h3>Add a new name:</h3>
        <input type="text" 
            placeholder="Add a new name" 
            v-on:keyup.enter="addName"
            v-on:blur="addName"
            v-model="new" 
        >

    </div><!-- /.container -->
@stop

@include('project003::_styles')

@section('js')
    {!! js('vue') !!}

    <script type="text/javascript">
        new Vue({

            el: '#demo',

            data: {

                new: '',
                names: [ 'Foo', 'Bar', 'Fizz', 'Buzz' ],
                
            },

            methods: {

                addName: function() {
                    this.names.push(this.new);
                    this.new = '';
                }
            }

        });
    </script>
@stop
