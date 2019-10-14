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

new Vue({
    el: '#blog',
    data: {
        articals: [],
        textSearch: '',
    },
    computed: {
        articalsFilter: function() {
            var textSearch = this.textSearch;
            return this.articals.filter(function(el) {
                return el.title.toLowerCase().indexOf(textSearch.toLowerCase()) !== -1;
            });
        }
    },
    created: function() {
        var that = this;
        axios.get('./api/posts/list')
            .then((response) => that.articals = response.data)
            .catch((error) => console.log(error));
    },
})