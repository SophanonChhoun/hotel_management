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
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/SingleImageUploader.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/SingleImageUploader.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  name: "SingleImageUploader",
  data: function data() {
    return {};
  },
  props: {
    image: {},
    value: {},
    size: {},
    pw: {},
    ph: {},
    defaultImage: {},
    isDisable: {
      type: Boolean,
      "default": false
    }
  },
  methods: {
    uploadImage: function uploadImage(event) {
      var that = this;
      var input = event.target;

      if (input.files && input.files[0]) {
        var img = new Image();

        img.onload = function (e) {
          var reader = new FileReader();

          reader.onload = function (e) {
            that.$emit('input', e.target.result);
          };

          reader.readAsDataURL(input.files[0]);
        };

        img.src = URL.createObjectURL(input.files[0]);
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-ckeditor2/dist/vue-ckeditor2.esm.js":
/*!**************************************************************!*\
  !*** ./node_modules/vue-ckeditor2/dist/vue-ckeditor2.esm.js ***!
  \**************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
var t=(new Date).getTime();/* harmony default export */ __webpack_exports__["default"] = (function(t,n,e,i,s,o,a,c,r,d){"boolean"!=typeof a&&(r=c,c=a,a=!1);var u,h="function"==typeof e?e.options:e;if(t&&t.render&&(h.render=t.render,h.staticRenderFns=t.staticRenderFns,h._compiled=!0,s&&(h.functional=!0)),i&&(h._scopeId=i),o?(u=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),n&&n.call(this,r(t)),t&&t._registeredComponents&&t._registeredComponents.add(o)},h._ssrRegister=u):n&&(u=a?function(){n.call(this,d(this.$root.$options.shadowRoot))}:function(t){n.call(this,c(t))}),u)if(h.functional){var f=h.render;h.render=function(t,n){return u.call(n),f(t,n)}}else{var l=h.beforeCreate;h.beforeCreate=l?[].concat(l,u):[u]}return e}({render:function(){var t=this.$createElement,n=this._self._c||t;return n("div",{staticClass:"ckeditor"},[n("textarea",{attrs:{name:this.name,id:this.id,types:this.types,config:this.config,disabled:this.readOnlyMode},domProps:{value:this.value}})])},staticRenderFns:[]},void 0,{name:"VueCkeditor",props:{name:{type:String,default:function(){return"editor-".concat(++t)}},value:{type:String},id:{type:String,default:function(){return"editor-".concat(t)}},types:{type:String,default:function(){return"classic"}},config:{type:Object,default:function(){}},instanceReadyCallback:{type:Function},readOnlyMode:{type:Boolean,default:function(){return!1}}},data:function(){return{instanceValue:""}},computed:{instance:function(){return CKEDITOR.instances[this.id]}},watch:{value:function(t){try{this.instance&&this.update(t)}catch(t){}},readOnlyMode:function(t){this.instance.setReadOnly(t)}},mounted:function(){this.create()},methods:{create:function(){var t=this;"undefined"==typeof CKEDITOR?console.log("CKEDITOR is missing (http://ckeditor.com/)"):("inline"===this.types?CKEDITOR.inline(this.id,this.config):CKEDITOR.replace(this.id,this.config),this.instance.setData(this.value),this.instance.on("instanceReady",function(){t.instance.setData(t.value)}),this.instance.on("change",this.onChange),this.instance.on("mode",this.onMode),this.instance.on("blur",function(n){t.$emit("blur",n)}),this.instance.on("focus",function(n){t.$emit("focus",n)}),this.instance.on("contentDom",function(n){t.$emit("contentDom",n)}),CKEDITOR.on("dialogDefinition",function(n){t.$emit("dialogDefinition",n)}),this.instance.on("fileUploadRequest",function(n){t.$emit("fileUploadRequest",n)}),this.instance.on("fileUploadResponse",function(n){setTimeout(function(){t.onChange()},0),t.$emit("fileUploadResponse",n)}),void 0!==this.instanceReadyCallback&&this.instance.on("instanceReady",this.instanceReadyCallback),this.$once("hook:beforeDestroy",function(){t.destroy()}))},update:function(t){this.instanceValue!==t&&(this.instance.setData(t,{internal:!1}),this.instanceValue=t)},destroy:function(){try{var t=window.CKEDITOR;t.instances&&t.instances[this.id]&&t.instances[this.id].destroy()}catch(t){}},onMode:function(){var t=this;if("source"===this.instance.mode){var n=this.instance.editable();n.attachListener(n,"input",function(){t.onChange()})}},onChange:function(){var t=this.instance.getData();t!==this.value&&(this.$emit("input",t),this.instanceValue=t)}}},void 0,!1,void 0,void 0,void 0));


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/SingleImageUploader.vue?vue&type=template&id=cbb09234&scoped=true&":
/*!**********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/SingleImageUploader.vue?vue&type=template&id=cbb09234&scoped=true& ***!
  \**********************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c("img", {
      attrs: {
        id: "thumb-image",
        width: _vm.pw,
        height: _vm.ph,
        src: _vm.value ? _vm.value : _vm.image ? _vm.image : _vm.defaultImage,
        alt: ""
      }
    }),
    _vm._v(" "),
    _c("br"),
    _vm._v(" "),
    !_vm.isDisable
      ? _c("div", { staticClass: "btn default btn-file" }, [
          _c("input", {
            attrs: {
              type: "file",
              name: "image",
              "data-width": 150,
              "data-height": 150,
              accept: ".jpg,.png"
            },
            on: { change: _vm.uploadImage }
          })
        ])
      : _vm._e()
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () {
        injectStyles.call(
          this,
          (options.functional ? this.parent : this).$root.$options.shadowRoot
        )
      }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./resources/js/components/SingleImageUploader.vue":
/*!*********************************************************!*\
  !*** ./resources/js/components/SingleImageUploader.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _SingleImageUploader_vue_vue_type_template_id_cbb09234_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./SingleImageUploader.vue?vue&type=template&id=cbb09234&scoped=true& */ "./resources/js/components/SingleImageUploader.vue?vue&type=template&id=cbb09234&scoped=true&");
/* harmony import */ var _SingleImageUploader_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SingleImageUploader.vue?vue&type=script&lang=js& */ "./resources/js/components/SingleImageUploader.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _SingleImageUploader_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _SingleImageUploader_vue_vue_type_template_id_cbb09234_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"],
  _SingleImageUploader_vue_vue_type_template_id_cbb09234_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  "cbb09234",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/SingleImageUploader.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/SingleImageUploader.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/SingleImageUploader.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SingleImageUploader_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./SingleImageUploader.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/SingleImageUploader.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SingleImageUploader_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/SingleImageUploader.vue?vue&type=template&id=cbb09234&scoped=true&":
/*!****************************************************************************************************!*\
  !*** ./resources/js/components/SingleImageUploader.vue?vue&type=template&id=cbb09234&scoped=true& ***!
  \****************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SingleImageUploader_vue_vue_type_template_id_cbb09234_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./SingleImageUploader.vue?vue&type=template&id=cbb09234&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/SingleImageUploader.vue?vue&type=template&id=cbb09234&scoped=true&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SingleImageUploader_vue_vue_type_template_id_cbb09234_scoped_true___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SingleImageUploader_vue_vue_type_template_id_cbb09234_scoped_true___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/hotel/create.js":
/*!**************************************!*\
  !*** ./resources/js/hotel/create.js ***!
  \**************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_SingleImageUploader__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../components/SingleImageUploader */ "./resources/js/components/SingleImageUploader.vue");
/* harmony import */ var vue_ckeditor2__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue-ckeditor2 */ "./node_modules/vue-ckeditor2/dist/vue-ckeditor2.esm.js");


new Vue({
  el: '#createHotel',
  components: {
    SingleImageUploader: _components_SingleImageUploader__WEBPACK_IMPORTED_MODULE_0__["default"],
    VueCkeditor: vue_ckeditor2__WEBPACK_IMPORTED_MODULE_1__["default"]
  },
  data: {
    data: {
      name: '',
      street_address: '',
      country: '',
      city: '',
      zip: '',
      is_enable: '',
      description: '',
      medias: []
    },
    is_submit: false,
    error: '',
    error_description: '',
    error_image: '',
    image: '',
    config: {
      toolbar: [['Bold', 'Italic', 'Underline', 'Strike', 'NumberedList', 'BulletedList', 'Indent', 'Outdent', 'Format', 'BGColor', 'TextColor']],
      height: 300
    }
  },
  mounted: function mounted() {},
  methods: {
    submit: function submit() {
      var _this = this;

      this.$validator.validateAll().then(function (result) {
        _this.is_submit = true;
        var save = true;

        if (_this.data.medias.length <= 0) {
          _this.error_image = "The Image field is required";
          save = false;
        }

        if (!_this.data.description) {
          _this.error_description = "The Description is required";
          save = false;
        } else {
          _this.error_description = "";
        }

        if (result && save) {
          axios.post('/admin/hotel/create', _this.data).then(function (response) {
            if (response.data.success) {
              window.location.href = '/admin/hotel/list';
            } else {
              console.log(response.data.message);
              _this.error = response.data.message;
            }
          });
        } else {
          //set Window location to top
          window.scrollTo(0, 0);
        }
      });
    },
    uploadAddingImage: function uploadAddingImage(index, event) {
      var _this2 = this;

      var image = event.target.files[0];
      console.log(event.target.files[0].size);
      var reader = new FileReader();
      reader.readAsDataURL(image);

      reader.onload = function (event) {
        Vue.set(_this2.data.medias[index], 'image', event.target.result);
        _this2.data[index].error = {
          image: ''
        };
      };
    },
    addMedias: function addMedias() {
      this.data.medias.push({
        image: '',
        error: {
          image: ''
        },
        sort: this.data.medias.length + 1
      });
    },
    removeSlider: function removeSlider(index) {
      this.data.medias.splice(index, 1);
      this.data.medias.forEach(function (item, i) {
        item.sort = i + 1;
      });
    }
  }
});

/***/ }),

/***/ 2:
/*!********************************************!*\
  !*** multi ./resources/js/hotel/create.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /Users/chhounsophanon/Desktop/web_project/hotel_management/Desktop/Laravel/project/hotel_system/resources/js/hotel/create.js */"./resources/js/hotel/create.js");


/***/ })

/******/ });