import Vue from 'vue';
import Vuex from 'vuex';
import Vuetify from 'vuetify';
import VueRouter from 'vue-router';
import VueTextareaAutosize from 'vue-textarea-autosize';
import firebase from 'firebase/app';
import axios from 'axios';
import AOS from 'aos';
import 'aos/dist/aos.css';
import '@mdi/font/css/materialdesignicons.css';
import 'firebase/firestore';
import VueScrollmagic from 'vue-scrollmagic';

Vue.config.productionTip = true;
window.axios = axios;
window.Vue = require('vue');
Vue.use(Vuex);
Vue.use(Vuetify);
Vue.use(VueRouter);
Vue.use(VueScrollmagic);
Vue.use(VueTextareaAutosize);

//init AOS
window.AOS = AOS;
AOS.init({ offset: 350, duration: 1000 });
//init firebase
import firebaseInit from './modules/firebaseInit';
firebase.initializeApp(firebaseInit);
export const db = firebase.firestore();
//init labVueRouter
import labRouter from './modules/labRouter.js';
const router = new VueRouter(labRouter);
//init vuexStore
import basicStore from './modules/basicStore';
const store = new Vuex.Store(basicStore);

import HeaderBar from './components/Layouts/HeaderBar.vue';
import FooterBar from './components/Layouts/FooterBar.vue';

import Posts from './components/Posts.vue';
import Show from './components/Show.vue';
import Home from './components/Home.vue';
import About from './components/About.vue';

import Lab from './components/VueRoutes/Lab.vue';

const app = new Vue({
    vuetify: new Vuetify(),
    el: '#app',
    components: {
        'header-bar': HeaderBar,
        'footer-bar': FooterBar,
        Posts: Posts,
        Show: Show,
        Home: Home,
        About: About,
        Lab: Lab,
    },
    data() {
        return {
            basic: {},
        };
    },
    mounted() {
        let that = this;
        axios
            .get('/api/basic')
            .then(response => (that.basic = response.data))
            .catch(error => console.log(error));
    },
    router,
    store,
});