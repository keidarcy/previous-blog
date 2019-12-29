import Vue from 'vue';
import Vuex from 'vuex';
import Vuetify from 'vuetify';
import VueRouter from 'vue-router';
import VueScrollmagic from 'vue-scrollmagic';
import VueTextareaAutosize from 'vue-textarea-autosize';
import '@mdi/font/css/materialdesignicons.css';

import axios from 'axios';
window.axios = axios;

Vue.config.productionTip = true;

window.Vue = require('vue');
Vue.use(Vuex);
Vue.use(Vuetify);
Vue.use(VueRouter);
Vue.use(VueScrollmagic, { vertical: true });
Vue.use(VueTextareaAutosize);

//init AOS

import AOS from 'aos';
import 'aos/dist/aos.css';
window.AOS = AOS;
AOS.init({ offset: 350, duration: 1000 });

//init firebase
import firebase from 'firebase/app';
import 'firebase/firestore';
import firebaseInit from './modules/firebaseInit';
firebase.initializeApp(firebaseInit);
export const db = firebase.firestore();

//init labVueRouter
import vueRouter from './modules/vue-router.js';
const router = new VueRouter(vueRouter);
//init vuexStore
import basicStore from './modules/basicStore';
const store = new Vuex.Store(basicStore);

import app from './app.vue';

new Vue({
    vuetify: new Vuetify(),
    el: '#app',
    components: {
        'vue-view': app,
    },
    router,
    store,
});