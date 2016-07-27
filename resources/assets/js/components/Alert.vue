<template>
    <div class="alert {{ type }}" v-show='show'>
        <h3>{{ type }}</h3>
        <slot>This is an alert box</slot>
        <div class="close" @click="show=false">x</div>
    </div>
</template>



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



<script type="text/javascript">
    
export default {

    props: ['type'],

    data() {
        return { 'show': true };
    },
    
};

</script>

