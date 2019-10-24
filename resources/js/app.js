import Vue from "vue";
import axios from "axios";
import AOS from "aos";
import "aos/dist/aos.css";

window.axios = axios;
window.Vue = require("vue");

Vue.config.productionTip = true;

// for fade in loadar
window.AOS = AOS;
AOS.init({
    offset: 350,
    duration: 1000
});

import Posts from "./components/Posts.vue";
import Show from "./components/Show.vue";

new Vue({
    el: "#app",
    components: {
        Posts: Posts,
        Show: Show
    },
    data: function() {
        return {
            burger: "",
            overlay: ""
        };
    },
    methods: {
        clickBurger() {
            this.burger = !this.burger ? "is-active" : "";
            this.overlay = !this.overlay ? "width:100%" : "";
        }
    }
});