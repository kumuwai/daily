@extends('layouts.main')

@section('notes')
    <p>This is a basic list. We can also add items to the list.</p>
@stop

@section('content')

    <div id="demo" class="container">

        <div class="col-xs-6">
            <h3>Using value:</h3>
            <ul>
                <li v-repeat="names">@{{ $value }}</li>
            </ul>
        </div>

        <div class="col-xs-6">
            <h3>Using defined variable:</h3>
            <ul>
                <li v-repeat="name: names">@{{ name }}</li>
            </ul>
        </div>

        <h3>Add a new name:</h3>
        <input type="text" placeholder="Add a new name" v-model="new" v-on="blur: addName">

    </div><!-- /.container -->
@stop

@section('js')
    {!! js('vue') !!}

    <script type="text/javascript">
        new Vue({

            el: '#demo',

            data: {

                names: [ 'Foo', 'Bar', 'Bazz', 'Buzz', 'Fizz', 'Bang' ],
                
            },

            methods: {

                addName: function() {
                    this.names.push(this.new);
                }
            }

        });
    </script>
@stop
