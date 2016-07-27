@extends('layouts.main')

@section('notes')
    <p>Part 6: This shows a price-list component (based on <a href="https://laracasts.com/series/learning-vue-step-by-step">Laracasts: Learning Vue Step by Step, Lesson 6</a>)</p>
@stop

@section('content')

    <div id="demo" class="container-fluid">

        <p>Prices:</p>
        <div v-for="plan in plans">
            <plan :plan="plan" :active.sync="active" inline-template>
                <div class=plan>
                    <span class="plan_name">
                        @{{ plan.name }}
                    </span>

                    <span class="plan_price">
                        $@{{ plan.price }}/month
                    </span>

                    <button @click="setActivePlan" 
                        v-show="plan.price != active.price"
                    >
                        @{{ isUpgrade ? 'Upgrade' : 'Downgrade' }}
                    </button>

                    <span v-else>
                        Current Plan
                    </span>

                </div>
            </plan>
        </div>

    </div><!-- /.container -->

@stop

@include('project003::_styles')
@section('css2')
<style type="text/css">
    .plan {
        margin: 5px;
    }
    .plan_name {
        display: inline-block;
        width: 5em;
    }
    .plan_price {
        display: inline-block;
        text-align: right;
        width: 6em;
        margin-right: 10px;
    }
</style>
@stop

@section('js')
    {!! js('vue') !!}

<script type="text/javascript">

    Vue.component('plan', {
        props: [ 'plan', 'active' ],
        computed: {
            isUpgrade: function() {
                return this.plan.price > this.active.price;
            }
        },
        methods: {
            setActivePlan: function() {
                this.active = this.plan;
            },
        },
    });

    new Vue({
        el: '#demo',

        data: {
            'plans': [
                { 'name': 'Enterprise', 'price': 100 },
                { 'name': 'Pro', 'price': 50 },
                { 'name': 'Personal', 'price': 10 },
                { 'name': 'Free', 'price': 0 },
            ],
            'active': {},
        },
    });

</script>
@stop
