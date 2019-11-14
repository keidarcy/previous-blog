import Vue from "vue";
import axios from "axios";
import AOS from "aos";
import "aos/dist/aos.css";
import Vuetify from "vuetify";
import "@mdi/font/css/materialdesignicons.css";
import VueTextareaAutosize from 'vue-textarea-autosize';
import firebase from 'firebase/app';
import 'firebase/firestore';
import VueRouter from 'vue-router'

window.axios = axios;
window.Vue = require("vue");
Vue.use(Vuetify);
Vue.use(VueRouter);
Vue.use(VueTextareaAutosize);
Vue.config.productionTip = true;

window.AOS = AOS;
AOS.init({
    offset: 350,
    duration: 1000
});

firebase.initializeApp({
    apiKey: process.env.MIX_FIRESTORE_API_KEY,
    authDomain: "xyyolab-17d11.firebaseapp.com",
    databaseURL: "https://xyyolab-17d11.firebaseio.com",
    projectId: "xyyolab-17d11",
    storageBucket: "xyyolab-17d11.appspot.com",
    messagingSenderId: "355977712868",
    appId: "1:355977712868:web:62e3632d5cc6bb46ee88f1"
});

export const db = firebase.firestore();

import HeaderBar from "./components/Layouts/HeaderBar.vue";
import FooterBar from "./components/Layouts/FooterBar.vue";

import Posts from "./components/Posts.vue";
import Show from "./components/Show.vue";
import Home from "./components/Home.vue";
import About from "./components/About.vue";

import Lab from "./components/VueRoutes/Lab.vue";
import Calendar from "./components/VueRoutes/Calendar.vue";
import Login from "./components/VueRoutes/Login.vue";
import Welcome from "./components/VueRoutes/Welcome.vue";

const router = new VueRouter({
    mode: 'history',
    routes: [{
            path: '/lab/calendar',
            name: 'Calendar',
            component: Calendar
        },
        {
            path: '/lab/login',
            name: 'Login',
            component: Login
        },
        {
            path: '/lab/Welcome',
            name: 'Welcome',
            component: Welcome
        }
    ],
});


const app = new Vue({
    vuetify: new Vuetify(),
    el: "#app",
    components: {
        'header-bar': HeaderBar,
        'footer-bar': FooterBar,
        Posts: Posts,
        Show: Show,
        Home: Home,
        Login: Login,
        About: About,
        Lab: Lab
    },
    data: function() {
        return {
            basic: {}
        };
    },
    mounted() {
        let that = this;
        axios
            .get("/api/basic")
            .then(response => (that.basic = response.data))
            .catch(error => console.log(error));
    },
    router,
});