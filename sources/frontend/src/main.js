import Vue from 'vue';
import App from './App.vue';
import router from './router'

import 'bootstrap/dist/css/bootstrap.css';
// CSS resets
import 'normalize.css/normalize.css';

import VueLoading from 'vuejs-loading-plugin'

// overwrite defaults
Vue.use(VueLoading)

Vue.config.productionTip = false

const EventBus = new Vue()

import api from '@/utils/api'


Object.defineProperties(Vue.prototype, {
    $api: {
        get: function () {
            return api
        }
    }
})

new Vue({
    el: '#app',
    router,
    render: h => h(App)
})