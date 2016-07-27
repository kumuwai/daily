@extends('layouts.main')

@section('notes')
    <p>Part 7: This shows a task component (based on <a href="https://laracasts.com/series/learning-vue-step-by-step">Laracasts: Learning Vue Step by Step, Lesson 8</a>)</p>
@stop

@section('content')

    <div id="app" class="container-fluid">

        <tasks :list="tasks"></tasks>

        <tasks :list="[
            {'name':'first','done':false},
            {'name':'second','done':false},
            {'name':'third','done':false}
        ]"></tasks>

    </div>

    <template id="tasks-template">
        <div>
            <h2>
                Task List
                <span v-show="remaining" class="remaining">
                    (@{{ remaining }} remaining)
                </span>
                <span v-else class="remaining">
                    (all done!)
                </span>
            </h2>
            <ul v-show="list.length">
                <li v-for='task in list'
                    @click='toggleTask(task)'                    
                >
                    <span :class="{ 'completed': task.done }">
                        @{{ task.name }}
                    </span>
                    <span @click='deleteTask(task)'>
                        x
                    </span>
                </li>
            </ul>
            <p v-else>No tasks have been entered</p>

            <input type="text" 
                placeholder="Add a new task" 
                v-on:keyup.enter="addTask"
                v-model="new" 
            >

            <button @click="clearCompleted"
                v-show="completed"
            >
                Clear @{{ completed }} Completed Tasks
            </button>

        </div>
    </template>

@stop

@include('project003::_styles')
@section('css2')
<style type="text/css">
    .remaining {
        font-size: x-small;
    }
    .completed {
        text-decoration: line-through;
    }
</style>
@stop

@section('js')
    {!! js('vue') !!}

<script type="text/javascript">

    Vue.component('tasks', {
        template: '#tasks-template',
        props: [ 'list' ],
        data: function() { 
            return { 'new': '' };
        },
        computed: {
            remaining: function() {
                return this.list.filter(
                    this.isInProgress
                ).length;
            },
            completed: function() {
                return this.list.length - this.remaining;
            },
        },
        methods: {
            isCompleted: function(task) {
                return task.done;
            },
            isInProgress: function(task) {
                return ! this.isCompleted(task);
            },
            addTask: function() {
                this.list.push({
                    'name': this.new,
                    'done': false,
                });
                this.new = '';
            },
            clearCompleted: function() {
                this.list=this.list.filter(this.isInProgress);
            },
            deleteTask: function(task) {
                this.list.$remove(task);
            },
            toggleTask: function(task) {
                task.done = ! task.done;
            },
        },
    });

    new Vue({
        el: '#app',

        data: {
            'tasks': [
                { 'name': 'go to bank', 'done': false },
                { 'name': 'go to store', 'done': false },
                { 'name': 'go to museum', 'done': true },
                { 'name': 'go to work', 'done': false },
            ],
            'active': {},
        },
    });

</script>
@stop
