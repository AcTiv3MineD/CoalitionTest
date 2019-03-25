/* */
import Vue from 'vue'
import VueToasted from 'vue-toasted'
import BootstrapVue from 'bootstrap-vue'

/* */
import './packages/http'
import router from './router'
import MainApp from './MainApp'

Vue.use(BootstrapVue)
Vue.use(VueToasted, {
    duration: 2500,
})

new Vue({
    router,
    render: h => h(MainApp),
}).$mount('#app')
