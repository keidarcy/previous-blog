/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require("./bootstrap");

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

// ——————————————————————————————————————————————————
// TextScramble
// ——————————————————————————————————————————————————

class TextScramble {
    constructor(el) {
        this.el = el;
        this.chars = "!<>-_\\/[]{}—=+*^?#________";
        this.update = this.update.bind(this);
    }
    setText(newText) {
        const oldText = this.el.innerText;
        const length = Math.max(oldText.length, newText.length);
        const promise = new Promise(resolve => (this.resolve = resolve));
        this.queue = [];
        for (let i = 0; i < length; i++) {
            const from = oldText[i] || "";
            const to = newText[i] || "";
            const start = Math.floor(Math.random() * 40);
            const end = start + Math.floor(Math.random() * 40);
            this.queue.push({ from, to, start, end });
        }
        cancelAnimationFrame(this.frameRequest);
        this.frame = 0;
        this.update();
        return promise;
    }
    update() {
        let output = "";
        let complete = 0;
        for (let i = 0, n = this.queue.length; i < n; i++) {
            let { from, to, start, end, char } = this.queue[i];
            if (this.frame >= end) {
                complete++;
                output += to;
            } else if (this.frame >= start) {
                if (!char || Math.random() < 0.28) {
                    char = this.randomChar();
                    this.queue[i].char = char;
                }
                output += `<span class="dud">${char}</span>`;
            } else {
                output += from;
            }
        }
        this.el.innerHTML = output;
        if (complete === this.queue.length) {
            this.resolve();
        } else {
            this.frameRequest = requestAnimationFrame(this.update);
            this.frame++;
        }
    }
    randomChar() {
        return this.chars[Math.floor(Math.random() * this.chars.length)];
    }
}

// ——————————————————————————————————————————————————
// Example
// ——————————————————————————————————————————————————

const phrases = [
    "Hi, there 😈",
    "My name is xyh 🐸",
    "Here is my lab 🧪",
    "Welcome 🧙‍♀️🧨"
];

const el = document.querySelector(".changing-words");
const fx = new TextScramble(el);

let counter = 0;
const next = () => {
    fx.setText(phrases[counter]).then(() => {
        setTimeout(next, 800);
    });
    counter = (counter + 1) % phrases.length;
};

next();

var userInput = document.getElementsByClassName("my-input")[0];

userInput.addEventListener("blur", function(e) {
    if (window.innerWidth < 700) {
        phrases.unshift(userInput.value);
        phrases.push(userInput.value);
        userInput.value = "";
    }
});

userInput.addEventListener("keypress", function(e) {
    var key = e.which || e.keyCode;
    if (key === 13) {
        // 13 is enter
        phrases.push(userInput.value);
        userInput.value = "";
    }
});

var addButton = document.getElementsByClassName("add-words")[0];

addButton.addEventListener("click", function(e) {
    phrases.push(userInput.value);
    userInput.value = "";
});
