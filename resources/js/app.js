import Vue from 'vue'
import App from './App'
import router from './router'

try {
    window.$ = window.jQuery = require('jquery')
    require('bootstrap')
    window._ = require('lodash')
} catch (e) {
    console.log('Error load main libraries')
}

Vue.prototype.config = window.config

window.Vue = new Vue({
    router,
    render: h => h(App)
}).$mount('#app')
