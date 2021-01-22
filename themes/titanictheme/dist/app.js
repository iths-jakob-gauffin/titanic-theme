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
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/app.js":
/*!********************!*\
  !*** ./src/app.js ***!
  \********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _searchResult__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./searchResult */ "./src/searchResult.js");
// import jQuery from "jquery";
 // const searchResult = new SearchResult();

Object(_searchResult__WEBPACK_IMPORTED_MODULE_0__["default"])(); // import accommodationSingle from "./accommodationSingle";
// accommodationSingle();

/***/ }),

/***/ "./src/app.scss":
/*!**********************!*\
  !*** ./src/app.scss ***!
  \**********************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ "./src/searchResult.js":
/*!*****************************!*\
  !*** ./src/searchResult.js ***!
  \*****************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var searchResult = function searchResult() {
  (function ($) {
    // $(".mphb-room-type").wrapAll('<div class="testwrapper"></div>');
    // $(".mphb-room-type").wrap('<div class="innerwrapper"></div>');
    // $(".mphb-room-type-title").wrap('<div class="detailWrapper"></div>');
    // $(".mphb-loop-room-type-attributes").wrap('<div class="detailWrapper"></div>');
    // $(".detailWrapper").wrapAll('<div class="detailsWrapper"></div>');
    var test = Array.from(document.querySelectorAll('.mphb-room-type-title.entry-title'));
    console.log("🚀 ~ file: searchResult.js ~ line 11 ~ searchResult ~ test", test);
    test.map(function (card) {
      var text = card.nextSibling.nextSibling;
      console.log("🚀 ~ file: searchResult.js ~ line 15 ~ searchResult ~ text", text);
      text.classList.add("detailToFlex");
      var cost = text.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling;
      console.log("🚀 ~ file: searchResult.js ~ line 19 ~ searchResult ~ cost", cost);
      cost.classList.add("detailToFlex");
    });
    var roomCards = Array.from(document.querySelectorAll('.mphb-room-type'));
    console.log("🚀 ~ file: searchResult.js ~ line 23 ~ searchResult ~ rooms", roomCards);
    roomCards.map(function (room) {
      var stuff = Array.from(room.querySelectorAll(".detailToFlex"));
      var wrapper = document.createElement("div");
      stuff.map(function (flexitem) {
        wrapper.insertAdjacentElement("beforeend", flexitem);
      });
      wrapper.classList.add("detailFlexWrapper");
      var reserveStuff = room.querySelector(".mphb-reserve-room-section");
      room.insertBefore(wrapper, reserveStuff);
      var cost = room.querySelector(".mphb-price").innerText;
      console.log("🚀 ~ file: searchResult.js ~ line 43 ~ searchResult ~ cost", cost);
      var amount = cost.split("kr").join("");
      var currency = cost.slice(0, 2); // let priceString = amount + " " + currency;    
      // console.log("🚀 ~ file: searchResult.js ~ line 47 ~ searchResult ~ priceString", priceString)

      var period = room.querySelector('.mphb-price-period').innerText;
      console.log("🚀 ~ file: searchResult.js ~ line 50 ~ searchResult ~ period", period);
      console.log("rummet: ", room);
      var priceDOM = room.querySelector(".mphb-regular-price.detailToFlex");
      var priceString = cost + " " + period + ".";
      var priceParagraph = document.createElement("p");
      priceParagraph.innerText = priceString;
      priceParagraph.className = "priceString"; // priceDOM.innerHTML = amount + " " + currency + " " + period + ".";
      // priceDOM.innerHTML = priceString;

      priceDOM.innerHTML = "";
      priceDOM.appendChild(priceParagraph);
    }); // let test = document.querySelector('.mphb-price').innerText;
    // let test2 = document.querySelector('.mphb-price-period').innerText;
    // let sum = test.split("kr").join("");
    // let currency = test.slice(0,2);
    // let priceString = sum + " " + currency + " " + test2;
    // let paragraph = test[0].nextSibling.nextSibling;
    // paragraph.classList.add("detailToFlex");
    // console.log("🚀 ~ file: searchResult.js ~ line 13 ~ searchResult ~ paragraph", paragraph.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling);
    // let price = paragraph.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling;
    // price.classList.add("detailToFlex");
    // console.log("🚀 ~ file: searchResult.js ~ line 17 ~ searchResult ~ price", price)
    // let rooms = Array.from(document.querySelectorAll('.mphb-room-type'));
    // console.log("🚀 ~ file: searchResult.js ~ line 23 ~ searchResult ~ rooms", rooms)
    // let details = rooms[0].querySelectorAll(".detailToFlex");
    // console.log("🚀 ~ file: searchResult.js ~ line 20 ~ searchResult ~ details", details);
    // let detailWrapper = document.createElement("div");
    // detailWrapper.insertAdjacentElement("beforeend", details[0]);
    // detailWrapper.insertAdjacentElement("beforeend", details[1]);
    // detailWrapper.classList.add("detailFlexWrapper");
    // let reserveBox = rooms[0].querySelector(".mphb-reserve-room-section");
    // console.log("🚀 ~ file: searchResult.js ~ line 36 ~ searchResult ~ reserveBox", reserveBox)
    // rooms[0].insertBefore(detailWrapper, reserveBox);
  })(jQuery);
};

/* harmony default export */ __webpack_exports__["default"] = (searchResult); // const searchResult = () => {
//     (function($) {
//         // $(".mphb-room-type").wrapAll('<div class="testwrapper"></div>');
//         // $(".mphb-room-type").wrap('<div class="innerwrapper"></div>');
//         // $(".mphb-room-type-title").wrap('<div class="detailWrapper"></div>');
//         // $(".mphb-loop-room-type-attributes").wrap('<div class="detailWrapper"></div>');
//         // $(".detailWrapper").wrapAll('<div class="detailsWrapper"></div>');
//         let test = Array.from(document.querySelectorAll('.mphb-room-type-title.entry-title'))
//         // console.log("🚀 ~ file: searchResult.js ~ line 11 ~ searchResult ~ test", test[0].nextSibling.nextSibling);
//         let paragraph = test[0].nextSibling.nextSibling;
//         paragraph.classList.add("detailToFlex");
//         console.log("🚀 ~ file: searchResult.js ~ line 13 ~ searchResult ~ paragraph", paragraph.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling);
//         let price = paragraph.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling;
//         price.classList.add("detailToFlex");
//         console.log("🚀 ~ file: searchResult.js ~ line 17 ~ searchResult ~ price", price)
//         let rooms = Array.from(document.querySelectorAll('.mphb-room-type'));
//         console.log("🚀 ~ file: searchResult.js ~ line 23 ~ searchResult ~ rooms", rooms)
//         let details = rooms[0].querySelectorAll(".detailToFlex");
//         console.log("🚀 ~ file: searchResult.js ~ line 20 ~ searchResult ~ details", details);
//         let detailWrapper = document.createElement("div");
//         // detailWrapper.innerHTML = details
//         // details.map(detail => {
//             detailWrapper.insertAdjacentElement("beforeend", details[0]);
//             detailWrapper.insertAdjacentElement("beforeend", details[1]);
//             // detailWrapper.innerHTML = details[1];
//         // })
//         detailWrapper.classList.add("detailFlexWrapper");
//         // console.log(detailWrapper);
//         let reserveBox = rooms[0].querySelector(".mphb-reserve-room-section");
//         console.log("🚀 ~ file: searchResult.js ~ line 36 ~ searchResult ~ reserveBox", reserveBox)
//         rooms[0].insertBefore(detailWrapper, reserveBox);
//     })(jQuery);
// };
// export default searchResult;

/***/ }),

/***/ 0:
/*!*****************************************!*\
  !*** multi ./src/app.js ./src/app.scss ***!
  \*****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! C:\Users\Jakob\Local Sites\titanicny\app\public\wp-content\themes\themes\titanictheme\src\app.js */"./src/app.js");
module.exports = __webpack_require__(/*! C:\Users\Jakob\Local Sites\titanicny\app\public\wp-content\themes\themes\titanictheme\src\app.scss */"./src/app.scss");


/***/ })

/******/ });