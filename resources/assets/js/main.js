// browserify entrypoint 

var Vue = require('vue');
var VueResource = require('vue-resource');

Vue.use(VueResource);


import Alert from './components/Alert.vue';

new Vue({

    el: '#app',

    components: { Alert },

});