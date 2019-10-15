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

if (location.href.includes("home") || location.pathname == "/") {
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

    var userInputDesk = document.getElementsByClassName("my-input")[0];
    userInputDesk.addEventListener("keypress", function(e) {
        var key = e.which || e.keyCode;
        if (key === 13) {
            if (userInputDesk.value != "") {
                phrases.push(userInputDesk.value);
                userInputDesk.value = "";
            }
        }
    });
    if (screen.width >= 768) {
        var addButton = document.getElementsByClassName("add-words")[0];
        addButton.addEventListener("click", function(e) {
            if (userInputDesk.value != "") {
                phrases.push(userInputDesk.value);
                userInputDesk.value = "";
            }
        });
    }
    if (screen.width < 768) {
        console.log(231);
        var userInputMoblie = document.getElementsByClassName("my-input")[1];
        var addButton = document.getElementsByClassName("add-words")[0];
        addButton.addEventListener("touchend", function(e) {
            if (userInputMoblie.value != "") {
                phrases.push(userInputMoblie.value);
                userInputMoblie.value = "";
            }
        });
    }
}
