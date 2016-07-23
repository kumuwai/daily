@extends('layouts.main')

@section('notes')
    <p>Part 4: This shows a basic list with sorting and filtering.</p>
@stop

@section('content')

    <div id="demo" class="container-fluid">

        <div class="row">
        <div class="col-sm-6">
            <input type="text" v-model="forValue" placeholder="search" class="form-control">
        </div>
        <div class="col-sm-6">
            <select class="form-control" v-model="forGender">
                <option v-for="gender in genders" value="@{{gender}}">
                    @{{ gender | capitalize}}
                </option>
            </select>
        </div>
        </div>

        <div class="row ">    
        <div class="col-sm-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th v-for="column in columns">
                        <a href="#" v-on:click="sortBy(column)">
                            @{{ column | capitalize }}
                        </a>
                    </th>
                </tr>
            </thead>
            <tr v-for="person in people | filterByGender | filterByValue | orderBy sortKey sortDesc">
                <td>@{{ person.name }}</td>
                <td>@{{ person.gender }}</td>
                <td>@{{ person.age }}</td>
            </tr>
        </table>

            <h3>Add a new person</h3>
            <input type="text" class="form-control" placeholder="Name" v-model="new_person.name">
            <input type="text" class="form-control" placeholder="Age" v-model="new_person.age">
            <select class="form-control" v-model="new_person.gender">
                <option v-for="gender in genders | except all " value="@{{gender}}">
                    @{{ gender | capitalize}}
                </option>
            </select>
            <button class="btn btn-primary" v-on:click="addPerson">Add</button>
        </div>

        <div class="col-sm-8">
            <pre><code class="json">@{{ $data | json }}</code></pre>
        </div>

        </div><!-- /.row -->

    </div><!-- /.container -->
@stop

@include('project003::_styles')

@section('js')
    {!! js('vue') !!}

    <script type="text/javascript">

        Vue.filter('except', function(values, exception){
            return values.filter(function(value){
                return (value != exception);
            });
        });

        new Vue({

            el: '#demo',

            data: {

                sortKey: '',
                sortDesc: false,

                forValue: '',
                forGender: 'all',

                genders: [ 'all', 'male', 'female', 'other' ],
                columns: [ 'name', 'gender', 'age' ],

                new_person: { name: '', age: '', gender: ''},

                people: [ 
                    { name: 'Foo', age: 44, gender: 'male' },
                    { name: 'Bar', age: 32, gender: 'female' },
                    { name: 'Fizz', age: 14, gender: 'male' },
                    { name: 'Buzz', age: 29, gender: 'female' },
                ],  
            },

            filters: {

                filterByGender: function(people) {
                    if (this.forGender == 'all') return people;

                    return people.filter(function(person){
                        return person.gender == this.forGender;
                    }, this);
                },

                filterByValue: function(people) {
                    return people.filter(function(person){
                        return person.name.toLowerCase().includes(this.forValue.toLowerCase())
                            || person.age.toString().includes(this.forValue); 
                    }, this);
                }
            },

            methods: {

                sortBy: function(sortKey) {
                    if (this.sortKey == sortKey)
                        return this.sortDesc = ! this.sortDesc;

                    this.sortKey = sortKey;
                    this.sortDesc = false;
                },

                addPerson: function() {
                    this.people.push(this.new_person);
                    this.new_person = { name: '', age: '', gender: ''};
                }
            },

        });
    </script>
@stop
