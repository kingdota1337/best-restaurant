// require('./bootstrap');
// import * from './bootstrap'

import { createApp } from 'vue/dist/vue.esm-bundler';
import HelloVue from './components/HelloVue.vue';

createApp({
    components: {
        HelloVue,
    }
}).mount('#app');