@extends('layouts.main')

@section('notes')
    <p>Part 8: This shows a task component with an ajax back-end served from Laravel.</p>
@stop

@section('content')

    <div id="app" class="container-fluid">

        <alert type="success">Successful Alert Box</alert>
        <alert type="success">Another Alert Box</alert>
        <alert type="warning">Another Alert Box</alert>
        <alert type="error">Another Alert Box</alert>

    </div>

    <template id="alert-template">
        <div class="alert @{{ type }}" v-show='show'>
            <h3>@{{ type }}</h3>
            <slot>This is an alert box</slot>
            <div class="close" @click="show=false">x</div>
        </div>
    </template>

@stop

@section('js')
{!! js('vue') !!}

<script type="text/javascript">
    
    Vue.component('alert', {
        template: '#alert-template',
        props: ['type'],
        data: function() {
            return { 'show': true };
        },
    });

    new Vue({
        el: '#app',
    });

</script>
@stop

@include('project003::_styles')
@section('css2')
<style type="text/css">
    .alert {
        position: relative;
        border: 1px solid;
        border-radius: 10px;
        padding: 20px;
    }
    .alert .close {
        position: absolute;
        top: 10px;
        right: 10px;
    }
    .alert h3 {
        margin: 0px;
        font-size: small;
        font-weight: bold;
        text-transform: capitalize;
    }
    .alert h3::after {
        content: '! ';
    }
    .success {
        background-color: #CFC;
        border-color: darken(#CFC, 10%);
    }
    .warning {
        background-color: #FFC;
        border-color: darken(#FFC, 10%);
    }
    .error {
        background-color: #FCC;
        border-color: darken(#FCC, 10%);
    }
</style>
@stop
