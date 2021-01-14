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
    $(".mphb-details-title").wrap('<div class="leftWrapper"></div>');
    $(".mphb-single-room-type-attributes").wrap('<div class="leftWrapper"></div>');
    $(".mphb-regular-price").wrap('<div class="leftWrapper"></div>');
    $(".leftWrapper").wrapAll('<div class="halfWrapper"></div>');
    $(".mphb-calendar-title").wrap('<div class="rightWrapper"></div>');
    $(".mphb-calendar").wrap('<div class="rightWrapper"></div>');
    $(".rightWrapper").wrapAll('<div class="halfWrapper"></div>');
    $(".halfWrapper").wrapAll('<div class="fullWrapper"></div>');
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

<<<<<<< HEAD
__webpack_require__(/*! C:\Users\SS\Local Sites\titanictheme\app\public\wp-content\themes\titanictheme\src\app.js */"./src/app.js");
module.exports = __webpack_require__(/*! C:\Users\SS\Local Sites\titanictheme\app\public\wp-content\themes\titanictheme\src\app.scss */"./src/app.scss");
=======
__webpack_require__(/*! C:\Users\jenni\Local Sites\newtitanictheme\app\public\wp-content\themes\titanictheme\src\app.js */"./src/app.js");
module.exports = __webpack_require__(/*! C:\Users\jenni\Local Sites\newtitanictheme\app\public\wp-content\themes\titanictheme\src\app.scss */"./src/app.scss");
>>>>>>> 651f8d58ad679aa3e9acee82bc825e9252a21f4e


/***/ })

/******/ });