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

/***/ "./src/accommodationSingle.js":
/*!************************************!*\
  !*** ./src/accommodationSingle.js ***!
  \************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var accommodationSingle = function accommodationSingle() {
  (function ($) {
    $(".mphb-calendar-title").wrap('<div class="leftWrapper"></div>');
    $(".mphb-calendar").wrap('<div class="leftWrapper"></div>');
    $(".mphb-reservation-form-title").wrap('<div class="leftWrapper"></div>');
    $(".mphb-booking-form").wrap('<div class="leftWrapper" id="special"></div>');
    $(".leftWrapper").wrapAll('<div class="bookingWrapper"></div>');
    $(".mphb-check-in-date-wrapper").wrap('<div class="checkWrapper"></div>');
    $(".mphb-check-out-date-wrapper").wrap('<div class="checkWrapper"></div>');
    $(".checkWrapper").wrapAll('<div class="dateWrapper"></div>');
    $(".mphb-capacity-wrapper").wrapAll('<div class="capacityWrapper"></div>');
    $(".dateWrapper").wrapAll('<div class="confirmWrapper"></div>');
    $(".mphb-reserve-btn-wrapper").wrap('<div class="rightConfirmWrapper"></div>');
    $(".mphb-errors-wrapper").wrap('<div class="rightConfirmWrapper"></div>');
    $(".mphb-reserve-room-section").wrap('<div class="rightConfirmWrapper"></div>');
    $(".rightConfirmWrapper").wrapAll('<div class="confirmWrapper"></div>');
    var test = document.querySelector('.mphb-price').innerText;
    var test2 = document.querySelector('.mphb-price-period').innerText;
    var sum = test.split("kr").join("");
    var currency = test.slice(0, 2);
    var priceString = sum + " " + currency + " " + test2;
    var place = document.querySelector('#special');
    var priceParagraph = document.createElement("p");
    priceParagraph.innerText = priceString;
    priceParagraph.className = "priceString";
    place.appendChild(priceParagraph);
    var harborGallery = document.querySelector('.mphb-room-type-gallery-wrapper');
    var harborTextPlace = document.querySelector('.Search__Title');
    var harborText = harborTextPlace.innerText.split(" ");
    var harborGalleryHeader = document.createElement("h3");
    harborGalleryHeader.innerText = "Bilder från hamnen i " + harborText[0];
    harborGallery.appendChild(harborGalleryHeader);
  })(jQuery);
};

/* harmony default export */ __webpack_exports__["default"] = (accommodationSingle);

/***/ }),

/***/ "./src/app.js":
/*!********************!*\
  !*** ./src/app.js ***!
  \********************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _searchResult__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./searchResult */ "./src/searchResult.js");
/* harmony import */ var _accommodationSingle__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./accommodationSingle */ "./src/accommodationSingle.js");
// import jQuery from "jquery";


var searchResult = new _searchResult__WEBPACK_IMPORTED_MODULE_0__["default"]();
Object(_accommodationSingle__WEBPACK_IMPORTED_MODULE_1__["default"])(); // searchResult();

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
    $(".mphb-room-type").wrapAll('<div class="testwrapper"></div>');
    $(".mphb-room-type").wrap('<div class="innerwrapper"></div>');
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