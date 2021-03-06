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
 // import Cards from "./cards";

Object(_searchResult__WEBPACK_IMPORTED_MODULE_0__["default"])(); // Cards();

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
    var test = Array.from(document.querySelectorAll('.mphb-room-type-title.entry-title'));
    test.map(function (card) {
      var text = card.nextSibling.nextSibling;
      text.classList.add("detailToFlex");
      var cost = text.nextSibling.nextSibling.nextSibling.nextSibling.nextSibling;
      cost.classList.add("detailToFlex");
    });
    var roomCards = Array.from(document.querySelectorAll('.mphb-room-type'));
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
      var period = room.querySelector('.mphb-price-period').innerText;
      var priceDOM = room.querySelector(".mphb-regular-price.detailToFlex");
      var priceString = cost + " " + period + ".";
      var priceParagraph = document.createElement("p");
      priceParagraph.innerText = priceString;
      priceParagraph.className = "priceString";
      priceDOM.innerHTML = "";
      priceDOM.appendChild(priceParagraph);
    });
    var answerDOM = document.querySelector('h2.SearchResults__QueryTitle');
    var amountOfHarbors = test.length;
    var answerString = "";

    if (amountOfHarbors !== 0 && amountOfHarbors !== 1) {
      answerString = amountOfHarbors + " hamnar";
    } else if (amountOfHarbors === 1) {
      answerString = amountOfHarbors + " hamn";
    } else {
      answerString = false;
    }

    ;
    var string = answerString ? "Det g\xE5r att boka plats p\xE5 ".concat(answerString, " mellan dina valda datum.") : "Det finns tyv\xE4rr inga lediga platser mellan dina valda datum. F\xF6rs\xF6k igen med andra datum.";
    answerDOM.innerText = string;
  })(jQuery);
};

/* harmony default export */ __webpack_exports__["default"] = (searchResult);

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