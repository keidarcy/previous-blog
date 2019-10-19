import Vue from 'vue';
import axios from 'axios';
import AOS from 'aos';
import 'aos/dist/aos.css';

window.axios = axios;
window.Vue = require("vue");

Vue.config.productionTip = false;

// for fade in loadar
window.AOS = AOS;
AOS.init({
    offset: 400,
    duration: 1000
});

new Vue({
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

if (location.pathname.includes('/posts')) {
    new Vue({
        el: '#posts',
        data: {
            articals: [],
            textSearch: '',
            about: location.pathname.slice(7)
        },
        computed: {
            articalsFilter: function() {
                var textSearch = this.textSearch;
                return this.articals.filter(function(el) {
                    return el.title.toLowerCase().includes(textSearch.toLowerCase());
                });
            }
        },
        mounted() {
            var that = this;
            axios.get(`/api${location.pathname}`)
                .then((response) => that.articals = response.data)
                .catch((error) => console.log(error));
        },
    })
}

let close_btn = document.getElementById('notification-close');
close_btn.addEventListener("click", function(e) {
    document.getElementById('mail-notification').style.display = 'none';
    document.getElementById('thanks').scrollIntoView({
        behavior: 'smooth'
    });
});