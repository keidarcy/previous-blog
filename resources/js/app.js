import Vue from "vue";
import axios from "axios";
import AOS from "aos";
import "aos/dist/aos.css";
import Vuetify from "vuetify";
import "@mdi/font/css/materialdesignicons.css";

window.axios = axios;
window.Vue = require("vue");
Vue.use(Vuetify);
Vue.config.productionTip = true;

// for fade in loadar
window.AOS = AOS;
AOS.init({
    offset: 350,
    duration: 1000
});

import Posts from "./components/Posts.vue";
import Show from "./components/Show.vue";
import Home from "./components/Home.vue";
import About from "./components/About.vue";
import Calendar from "./components/Calendar.vue";

new Vue({
    vuetify: new Vuetify(),

    el: "#app",
    components: {
        Posts: Posts,
        Show: Show,
        Home: Home,
        Calendar: Calendar,
        About: About
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
    }
});
