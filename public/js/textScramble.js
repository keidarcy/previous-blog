/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/textScramble.js":
/*!**************************************!*\
  !*** ./resources/js/textScramble.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var TextScramble =
/*#__PURE__*/
function () {
  function TextScramble(el) {
    _classCallCheck(this, TextScramble);

    this.el = el;
    this.chars = "!<>-_\\/[]{}—=+*^?#________";
    this.update = this.update.bind(this);
  }

  _createClass(TextScramble, [{
    key: "setText",
    value: function setText(newText) {
      var _this = this;

      var oldText = this.el.innerText;
      var length = Math.max(oldText.length, newText.length);
      var promise = new Promise(function (resolve) {
        return _this.resolve = resolve;
      });
      this.queue = [];

      for (var i = 0; i < length; i++) {
        var from = oldText[i] || "";
        var to = newText[i] || "";
        var start = Math.floor(Math.random() * 40);
        var end = start + Math.floor(Math.random() * 40);
        this.queue.push({
          from: from,
          to: to,
          start: start,
          end: end
        });
      }

      cancelAnimationFrame(this.frameRequest);
      this.frame = 0;
      this.update();
      return promise;
    }
  }, {
    key: "update",
    value: function update() {
      var output = "";
      var complete = 0;

      for (var i = 0, n = this.queue.length; i < n; i++) {
        var _this$queue$i = this.queue[i],
            from = _this$queue$i.from,
            to = _this$queue$i.to,
            start = _this$queue$i.start,
            end = _this$queue$i.end,
            _char = _this$queue$i["char"];

        if (this.frame >= end) {
          complete++;
          output += to;
        } else if (this.frame >= start) {
          if (!_char || Math.random() < 0.28) {
            _char = this.randomChar();
            this.queue[i]["char"] = _char;
          }

          output += "<span class=\"dud\">".concat(_char, "</span>");
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
  }, {
    key: "randomChar",
    value: function randomChar() {
      return this.chars[Math.floor(Math.random() * this.chars.length)];
    }
  }]);

  return TextScramble;
}(); // let somestore = [];
// async function getPhrase() {
//     try {
//         const response = await axios.get('/api/phrases/list');
//         somestore.push(response.data);
//     } catch (error) {
//         console.error(error);
//     }
// }
// getPhrase();
// console.log(somestore);


if (location.href.includes("home")) {
  var phrases = ["Hi, there 😈", "My name is xyh 🐸", "Here is my lab 🧪", "Welcome 🧙‍♀️🧨"];
  var el = document.querySelector(".changing-words");
  var fx = new TextScramble(el);
  var counter = 0;

  var next = function next() {
    fx.setText(phrases[counter]).then(function () {
      setTimeout(next, 800);
    });
    counter = (counter + 1) % phrases.length;
  };

  next();
  var userInputDesk = document.getElementsByClassName("my-input")[0];
  userInputDesk.addEventListener("keypress", function (e) {
    var key = e.which || e.keyCode;

    if (key === 13) {
      phrases.push(userInputDesk.value);
      userInputDesk.value = "";
    }
  });

  if (screen.width >= 768) {
    var addButton = document.getElementsByClassName("add-words")[0];
    addButton.addEventListener("click", function (e) {
      phrases.push(userInputDesk.value);
      userInputDesk.value = "";
    });
  }

  if (screen.width < 768) {
    console.log(231);
    var userInputMoblie = document.getElementsByClassName("my-input")[1];
    var addButton = document.getElementsByClassName("add-words")[0];
    addButton.addEventListener("touchend", function (e) {
      phrases.push(userInputMoblie.value);
      userInputMoblie.value = "";
    });
  }
}

/***/ }),

/***/ 1:
/*!********************************************!*\
  !*** multi ./resources/js/textScramble.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/xyh/Code/Sites/blog/resources/js/textScramble.js */"./resources/js/textScramble.js");


/***/ })

/******/ });