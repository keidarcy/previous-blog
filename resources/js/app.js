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

// for fade in loadar
window.AOS = AOS;
AOS.init({
    offset: 350,
    duration: 1000
});

firebase.initializeApp({
    apiKey: "AIzaSyDnvnF0mRffnyTh9w3NEvBW8OPBxkWKlXA",
    authDomain: "vue-calendar-47ae3.firebaseapp.com",
    databaseURL: "https://vue-calendar-47ae3.firebaseio.com",
    projectId: "vue-calendar-47ae3",
    storageBucket: "vue-calendar-47ae3.appspot.com",
    messagingSenderId: "762227952147",
    appId: "1:762227952147:web:e279c88d5aec0d3e594de6"
});

export const db = firebase.firestore();

import Posts from "./components/Posts.vue";
import Show from "./components/Show.vue";
import Home from "./components/Home.vue";
import About from "./components/About.vue";

import Lab from "./components/Lab.vue";
import Calendar from "./components/Calendar.vue";
import Login from "./components/Login.vue";

const router = new VueRouter({
    mode: 'history',
    routes: [{
            path: '/lab/calendar',
            name: 'calendar',
            component: Calendar
        },
        {
            path: '/lab/login',
            name: 'login',
            component: Login
        }
    ],
});


const app = new Vue({
    vuetify: new Vuetify(),

    el: "#app",
    components: {
        Posts: Posts,
        Show: Show,
        Home: Home,
        Login: Login,
        //Calendar: Calendar,
        About: About,
        Lab: Lab
    },
    data: function() {
        return {
            burger: "",
            overlay: "",
            basic: {}
        };
    },
    methods: {
        clickBurger() {
            this.burger = !this.burger ? "is-active" : "";
            this.overlay = !this.overlay ? "width:100%" : "";
        }
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