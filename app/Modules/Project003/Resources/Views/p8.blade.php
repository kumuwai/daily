@extends('layouts.main')

@section('notes')
    <p>Part 8: This shows a task component with an ajax back-end served from Laravel (based on <a href="https://laracasts.com/series/learning-vue-step-by-step">Laracasts: Learning Vue Step by Step, Lesson 10</a>).</p>
@stop

@section('content')

    <div id="app" class="container-fluid">

        <tasks token="{{ csrf_token() }}"></tasks>

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
                <li v-for='task in list'>
                    <span :class="{ 'completed': task.done }"
                        @click='toggleTask(task)'
                    >
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
    {!! js('jquery') !!}

<script type="text/javascript">

    Vue.component('tasks', {
        template: '#tasks-template',
        props: ['token'],
        created() {
            this.fetchTaskList();
        },
        data: function() { 
            return { 
                'list': [],
                'new': '',
            };
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
                if (! this.new)
                    return;
                vm = this;
                $.ajax({
                    'method': 'POST',
                    'url': 'api/tasks',
                    'data': {
                        '_token': this.token,
                        'name': this.new,
                    }
                }).done(function(data, textStatus, jqXHR ){
                    vm.list.push(data.data);
                    vm.new = '';
                });
            },
            clearCompleted: function() {
                vm = this;
                tasks = this.list.filter(this.isCompleted)
                    .map(function(a){ return a.id; });
                $.ajax({
                    'method': 'DELETE',
                    'url': 'api/tasks/' + tasks,
                    'data': {
                        '_token': this.token,
                    },
                }).done(function(data, textStatus, jqXHR ){
                    vm.list=vm.list.filter(vm.isInProgress);
                });
            },
            deleteTask: function(task) {
                vm = this;
                $.ajax({
                    'method': 'DELETE',
                    'url': 'api/tasks/' + task.id,
                    'data': {
                        '_token': this.token,
                    },
                }).done(function(data, textStatus, jqXHR ){
                    vm.list.$remove(task);
                });
            },
            toggleTask: function(task) {
                $.ajax({
                    'method': 'PUT',
                    'url': 'api/tasks/' + task.id,
                    'data': {
                        '_token': this.token,
                        'done': task.done,
                    }
                }).done(function( jqXHR, textStatus, errorThrown ) {
                    task.done = ! task.done;
                });
            },
            fetchTaskList: function() {
                vm = this;
                $.getJSON('api/tasks', function(tasks){
                    vm.list = tasks.data;
                });
            },
        },
    });

    new Vue({
        el: '#app',
    });

</script>
@stop
