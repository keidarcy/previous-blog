import Vue from 'vue';
import axios from 'axios';
import AOS from 'aos';
import 'aos/dist/aos.css';

window.axios = axios;
window.Vue = require("vue");


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component(
    "example-component",
    require("./components/ExampleComponent.vue").default
);

// Vue.component("articals",
//     require('./components/Articals.vue')
// );

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.config.productionTip = false;

const app = new Vue({
    el: "#app",
    data: {
        test: "",
        burger: "",
        overlay: ""
    },
    methods: {
        clickBurger() {
            this.burger = !this.burger ? "is-active" : "";
            this.overlay = !this.overlay ? "width:100%" : "";
        }
    }
});


import Articals from './components/Articals.vue';
new Vue({
    el: '#articals',
    components: { Articals }
})

// for fade in load
window.AOS = AOS;
AOS.init({
    offset: 400,
    duration: 1000
});