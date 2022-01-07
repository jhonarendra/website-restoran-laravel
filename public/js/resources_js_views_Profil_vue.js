(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_views_Profil_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Profil.vue?vue&type=script&lang=js&":
/*!********************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Profil.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var core_js_modules_es_array_filter_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.filter.js */ "./node_modules/core-js/modules/es.array.filter.js");
/* harmony import */ var core_js_modules_es_array_filter_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_filter_js__WEBPACK_IMPORTED_MODULE_0__);

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
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      darkMode: this.$store.getters.getDarkMode,
      userLogin: null,
      isLoading: true
    };
  },
  methods: {
    toggleDarkMode: function toggleDarkMode() {
      if (this.darkMode) {
        this.darkMode = false;
      } else {
        this.darkMode = true;
      }

      this.$store.dispatch('setDarkMode', this.darkMode);
    },
    exportData: function exportData() {
      // ambil semua di localstorage
      var dompet = JSON.parse(localStorage.dompet);
      var setting = JSON.parse(localStorage.setting);
      var widgetFilter = JSON.parse(localStorage.widgetFilter);
      var transaksi = JSON.parse(localStorage.transaksi);
      var anggaran = JSON.parse(localStorage.anggaran);
      var kategori = JSON.parse(localStorage.kategori);
      var filter = JSON.parse(localStorage.filter);
      console.log({
        dompet: dompet,
        setting: setting,
        widgetFilter: widgetFilter,
        transaksi: transaksi,
        anggaran: anggaran,
        kategori: kategori,
        filter: filter
      });
      console.log('localStorage');
      console.log('localStorage.setItem("dompet", ' + JSON.stringify(JSON.stringify(dompet)) + ')');
      console.log('localStorage.setItem("setting", ' + JSON.stringify(JSON.stringify(setting)) + ')');
      console.log('localStorage.setItem("widgetFilter", ' + JSON.stringify(JSON.stringify(widgetFilter)) + ')');
      console.log('localStorage.setItem("transaksi", ' + JSON.stringify(JSON.stringify(transaksi)) + ')');
      console.log('localStorage.setItem("anggaran", ' + JSON.stringify(JSON.stringify(anggaran)) + ')');
      console.log('localStorage.setItem("kategori", ' + JSON.stringify(JSON.stringify(kategori)) + ')');
      console.log('localStorage.setItem("filter", ' + JSON.stringify(JSON.stringify(filter)) + ')');
    },
    logout: function logout() {
      localStorage.clear();
      window.location = '/logout';
    },
    fetchUserLogin: function fetchUserLogin() {
      var _this = this;

      if (!this.$store.getters.getUserLogin) {
        this.$store.dispatch('fetchUserLogin').then(function (res) {
          var userLoginTest = _this.$store.getters.getUserLogin;

          if (userLoginTest) {
            _this.userLogin = userLoginTest;
          }

          _this.isLoading = false;
        });
      } else {
        this.userLogin = this.$store.getters.getUserLogin;
        this.isLoading = false;
      }
    },
    hapusData: function hapusData() {
      console.log('hapus data user');
    }
  },
  created: function created() {
    this.fetchUserLogin();
  }
});

/***/ }),

/***/ "./node_modules/core-js/internals/array-method-has-species-support.js":
/*!****************************************************************************!*\
  !*** ./node_modules/core-js/internals/array-method-has-species-support.js ***!
  \****************************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

var fails = __webpack_require__(/*! ../internals/fails */ "./node_modules/core-js/internals/fails.js");
var wellKnownSymbol = __webpack_require__(/*! ../internals/well-known-symbol */ "./node_modules/core-js/internals/well-known-symbol.js");
var V8_VERSION = __webpack_require__(/*! ../internals/engine-v8-version */ "./node_modules/core-js/internals/engine-v8-version.js");

var SPECIES = wellKnownSymbol('species');

module.exports = function (METHOD_NAME) {
  // We can't use this feature detection in V8 since it causes
  // deoptimization and serious performance degradation
  // https://github.com/zloirock/core-js/issues/677
  return V8_VERSION >= 51 || !fails(function () {
    var array = [];
    var constructor = array.constructor = {};
    constructor[SPECIES] = function () {
      return { foo: 1 };
    };
    return array[METHOD_NAME](Boolean).foo !== 1;
  });
};


/***/ }),

/***/ "./node_modules/core-js/modules/es.array.filter.js":
/*!*********************************************************!*\
  !*** ./node_modules/core-js/modules/es.array.filter.js ***!
  \*********************************************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

"use strict";

var $ = __webpack_require__(/*! ../internals/export */ "./node_modules/core-js/internals/export.js");
var $filter = __webpack_require__(/*! ../internals/array-iteration */ "./node_modules/core-js/internals/array-iteration.js").filter;
var arrayMethodHasSpeciesSupport = __webpack_require__(/*! ../internals/array-method-has-species-support */ "./node_modules/core-js/internals/array-method-has-species-support.js");

var HAS_SPECIES_SUPPORT = arrayMethodHasSpeciesSupport('filter');

// `Array.prototype.filter` method
// https://tc39.es/ecma262/#sec-array.prototype.filter
// with adding support of @@species
$({ target: 'Array', proto: true, forced: !HAS_SPECIES_SUPPORT }, {
  filter: function filter(callbackfn /* , thisArg */) {
    return $filter(this, callbackfn, arguments.length > 1 ? arguments[1] : undefined);
  }
});


/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Profil.vue?vue&type=style&index=0&id=74bc7a1b&scoped=true&lang=css&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Profil.vue?vue&type=style&index=0&id=74bc7a1b&scoped=true&lang=css& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../node_modules/css-loader/dist/runtime/api.js */ "./node_modules/css-loader/dist/runtime/api.js");
/* harmony import */ var _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0__);
// Imports

var ___CSS_LOADER_EXPORT___ = _node_modules_css_loader_dist_runtime_api_js__WEBPACK_IMPORTED_MODULE_0___default()(function(i){return i[1]});
// Module
___CSS_LOADER_EXPORT___.push([module.id, "\n#profil[data-v-74bc7a1b] {\n\twidth: 100%;\n\t-webkit-animation: slideIn .5s;\n\t        animation: slideIn .5s;\n}\n.profil-img[data-v-74bc7a1b] {\n\tflex: 1;\n\twidth: 80px;\n\theight: 80px;\n\tborder-radius: 50%;\n}\n.profil-name[data-v-74bc7a1b] {\n\tmargin-top: 16px;\n\tpadding-left: 16px;\n\tfont-size: .8rem;\n}\n@media (max-width: 768px){\n.profil-img[data-v-74bc7a1b] {\n\t\twidth: 60px;\n\t\theight: 60px;\n}\n.profil-name[data-v-74bc7a1b] {\n\t\tmargin-top: 0;\n\t\tpadding-left: 16px;\n}\n}\n.list-group[data-v-74bc7a1b] {\n\tfont-size: .8rem;\n}\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./resources/js/views/Profil.vue":
/*!***************************************!*\
  !*** ./resources/js/views/Profil.vue ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Profil_vue_vue_type_template_id_74bc7a1b_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Profil.vue?vue&type=template&id=74bc7a1b&scoped=true& */ "./resources/js/views/Profil.vue?vue&type=template&id=74bc7a1b&scoped=true&");
/* harmony import */ var _Profil_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Profil.vue?vue&type=script&lang=js& */ "./resources/js/views/Profil.vue?vue&type=script&lang=js&");
/* harmony import */ var _Profil_vue_vue_type_style_index_0_id_74bc7a1b_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Profil.vue?vue&type=style&index=0&id=74bc7a1b&scoped=true&lang=css& */ "./resources/js/views/Profil.vue?vue&type=style&index=0&id=74bc7a1b&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__.default)(
  _Profil_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _Profil_vue_vue_type_template_id_74bc7a1b_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _Profil_vue_vue_type_template_id_74bc7a1b_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "74bc7a1b",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/Profil.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/views/Profil.vue?vue&type=script&lang=js&":
/*!****************************************************************!*\
  !*** ./resources/js/views/Profil.vue?vue&type=script&lang=js& ***!
  \****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Profil_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Profil.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Profil.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Profil_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/views/Profil.vue?vue&type=template&id=74bc7a1b&scoped=true&":
/*!**********************************************************************************!*\
  !*** ./resources/js/views/Profil.vue?vue&type=template&id=74bc7a1b&scoped=true& ***!
  \**********************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Profil_vue_vue_type_template_id_74bc7a1b_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Profil_vue_vue_type_template_id_74bc7a1b_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Profil_vue_vue_type_template_id_74bc7a1b_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Profil.vue?vue&type=template&id=74bc7a1b&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Profil.vue?vue&type=template&id=74bc7a1b&scoped=true&");


/***/ }),

/***/ "./resources/js/views/Profil.vue?vue&type=style&index=0&id=74bc7a1b&scoped=true&lang=css&":
/*!************************************************************************************************!*\
  !*** ./resources/js/views/Profil.vue?vue&type=style&index=0&id=74bc7a1b&scoped=true&lang=css& ***!
  \************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_style_loader_index_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Profil_vue_vue_type_style_index_0_id_74bc7a1b_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-style-loader/index.js!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Profil.vue?vue&type=style&index=0&id=74bc7a1b&scoped=true&lang=css& */ "./node_modules/vue-style-loader/index.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Profil.vue?vue&type=style&index=0&id=74bc7a1b&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_style_loader_index_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Profil_vue_vue_type_style_index_0_id_74bc7a1b_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_vue_style_loader_index_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Profil_vue_vue_type_style_index_0_id_74bc7a1b_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ var __WEBPACK_REEXPORT_OBJECT__ = {};
/* harmony reexport (unknown) */ for(const __WEBPACK_IMPORT_KEY__ in _node_modules_vue_style_loader_index_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Profil_vue_vue_type_style_index_0_id_74bc7a1b_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== "default") __WEBPACK_REEXPORT_OBJECT__[__WEBPACK_IMPORT_KEY__] = () => _node_modules_vue_style_loader_index_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Profil_vue_vue_type_style_index_0_id_74bc7a1b_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[__WEBPACK_IMPORT_KEY__]
/* harmony reexport (unknown) */ __webpack_require__.d(__webpack_exports__, __WEBPACK_REEXPORT_OBJECT__);


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Profil.vue?vue&type=template&id=74bc7a1b&scoped=true&":
/*!*************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Profil.vue?vue&type=template&id=74bc7a1b&scoped=true& ***!
  \*************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { attrs: { id: "profil" } }, [
    _c("div", { staticClass: "container" }, [
      _c("div", { staticClass: "d-flex pt-4 pb-3 pl-3 pr-3" }, [
        _vm._m(0),
        _vm._v(" "),
        !_vm.isLoading
          ? _c("div", { staticClass: "profil-name" }, [
              _c("p", { staticClass: "mb-1" }, [
                _c("b", [_vm._v(_vm._s(_vm.userLogin.nama_lengkap))])
              ]),
              _vm._v(" "),
              _c("span", [_vm._v(_vm._s(_vm.userLogin.email))])
            ])
          : _c("div", { staticClass: "profil-name" }, [
              _vm._m(1),
              _vm._v(" "),
              _c("span", { staticClass: "content-loader" }, [
                _vm._v("jhonarendra@gmail.com")
              ])
            ])
      ]),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "list-group" },
        [
          _c(
            "router-link",
            {
              staticClass:
                "\n\t\t\t\t\tlist-group-item\n\t\t\t\t\tlist-group-item-action\n\t\t\t\t\td-flex justify-content-between\n\t\t\t\t\talign-items-center\n\t\t\t\t",
              attrs: { to: "master_profil" }
            },
            [
              _vm._v("\n\t\t\t\tData Pribadi\n\t\t\t\t"),
              _c(
                "svg",
                {
                  staticClass: "svg-chevron-right svg-fill-light-gray",
                  attrs: { viewBox: "0 0 24 24" }
                },
                [_c("path", { attrs: { d: "" } })]
              )
            ]
          )
        ],
        1
      ),
      _vm._v(" "),
      _c("div", { staticClass: "list-group mt-3" }, [
        _c(
          "a",
          {
            staticClass:
              "\n\t\t\t\tlist-group-item\n\t\t\t\tlist-group-item-action\n\t\t\t\td-flex justify-content-between\n\t\t\t\talign-items-center",
            on: {
              click: function($event) {
                return _vm.toggleDarkMode()
              }
            }
          },
          [
            _vm._v("\n\t\t\t\tDark Mode\n\t\t\t\t"),
            _vm.darkMode
              ? _c(
                  "svg",
                  {
                    staticClass: "svg-toggle-switch svg-fill-purple",
                    attrs: { viewBox: "0 0 24 24" }
                  },
                  [_c("path", { attrs: { d: "" } })]
                )
              : _c(
                  "svg",
                  {
                    staticClass: "svg-toggle-switch-off svg-fill-light-gray",
                    attrs: { viewBox: "0 0 24 24" }
                  },
                  [_c("path", { attrs: { d: "" } })]
                )
          ]
        )
      ]),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "list-group mt-3" },
        [
          _c(
            "router-link",
            {
              staticClass:
                "\n\t\t\t\t\tlist-group-item\n\t\t\t\t\tlist-group-item-action\n\t\t\t\t\td-flex justify-content-between\n\t\t\t\t\talign-items-center\n\t\t\t\t",
              attrs: { to: "master_dompet" }
            },
            [
              _vm._v("\n\t\t\t\tDompet\n\t\t\t\t"),
              _c(
                "svg",
                {
                  staticClass: "svg-chevron-right svg-fill-light-gray",
                  attrs: { viewBox: "0 0 24 24" }
                },
                [_c("path", { attrs: { d: "" } })]
              )
            ]
          ),
          _vm._v(" "),
          _c(
            "router-link",
            {
              staticClass:
                "\n\t\t\t\t\tlist-group-item\n\t\t\t\t\tlist-group-item-action\n\t\t\t\t\td-flex justify-content-between\n\t\t\t\t\talign-items-center\n\t\t\t\t",
              attrs: { to: "master_kategori" }
            },
            [
              _vm._v("\n\t\t\t\tKategori\n\t\t\t\t"),
              _c(
                "svg",
                {
                  staticClass: "svg-chevron-right svg-fill-light-gray",
                  attrs: { viewBox: "0 0 24 24" }
                },
                [_c("path", { attrs: { d: "" } })]
              )
            ]
          ),
          _vm._v(" "),
          _c(
            "router-link",
            {
              staticClass:
                "\n\t\t\t\t\tlist-group-item\n\t\t\t\t\tlist-group-item-action\n\t\t\t\t\td-flex justify-content-between\n\t\t\t\t\talign-items-center\n\t\t\t\t",
              attrs: { to: "sinkron_data" }
            },
            [
              _vm._v("\n\t\t\t\tSinkron Data ke Cloud\n\t\t\t\t"),
              _c(
                "svg",
                {
                  staticClass: "svg-chevron-right svg-fill-light-gray",
                  attrs: { viewBox: "0 0 24 24" }
                },
                [_c("path", { attrs: { d: "" } })]
              )
            ]
          ),
          _vm._v(" "),
          _c(
            "a",
            {
              staticClass:
                "\n\t\t\t\tlist-group-item\n\t\t\t\tlist-group-item-action\n\t\t\t\td-flex justify-content-between\n\t\t\t\talign-items-center"
            },
            [
              _vm._v("\n\t\t\t\tImport Data\n\t\t\t\t"),
              _c(
                "svg",
                {
                  staticClass: "svg-chevron-right svg-fill-light-gray",
                  attrs: { viewBox: "0 0 24 24" }
                },
                [_c("path", { attrs: { d: "" } })]
              )
            ]
          ),
          _vm._v(" "),
          _c(
            "a",
            {
              staticClass:
                "\n\t\t\t\tlist-group-item\n\t\t\t\tlist-group-item-action\n\t\t\t\td-flex justify-content-between\n\t\t\t\talign-items-center",
              on: {
                click: function($event) {
                  return _vm.exportData()
                }
              }
            },
            [
              _vm._v("\n\t\t\t\tExport Data\n\t\t\t\t"),
              _c(
                "svg",
                {
                  staticClass: "svg-chevron-right svg-fill-light-gray",
                  attrs: { viewBox: "0 0 24 24" }
                },
                [_c("path", { attrs: { d: "" } })]
              )
            ]
          )
        ],
        1
      ),
      _vm._v(" "),
      _c("div", { staticClass: "list-group mt-3" }, [
        _c(
          "a",
          {
            staticClass:
              "\n\t\t\t\ttext-danger\n\t\t\t\tlist-group-item\n\t\t\t\tlist-group-item-action\n\t\t\t\td-flex justify-content-between\n\t\t\t\talign-items-center",
            on: { click: _vm.logout }
          },
          [
            _vm._v("\n\t\t\t\tLogout\n\t\t\t\t"),
            _c(
              "svg",
              {
                staticClass: "svg-chevron-right svg-fill-light-gray",
                attrs: { viewBox: "0 0 24 24" }
              },
              [_c("path", { attrs: { d: "" } })]
            )
          ]
        ),
        _vm._v(" "),
        _c(
          "a",
          {
            staticClass:
              "\n\t\t\t\ttext-danger\n\t\t\t\tlist-group-item\n\t\t\t\tlist-group-item-action\n\t\t\t\td-flex justify-content-between\n\t\t\t\talign-items-center",
            on: { click: _vm.hapusData }
          },
          [
            _vm._v("\n\t\t\t\tHapus Data\n\t\t\t\t"),
            _c(
              "svg",
              {
                staticClass: "svg-chevron-right svg-fill-light-gray",
                attrs: { viewBox: "0 0 24 24" }
              },
              [_c("path", { attrs: { d: "" } })]
            )
          ]
        )
      ]),
      _vm._v(" "),
      _vm._m(2)
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", [_c("div", { staticClass: "profil-img bg-purple-100" })])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("p", { staticClass: "mb-1" }, [
      _c("span", { staticClass: "content-loader" }, [
        _vm._v("Putu Jhonarendra")
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "mt-5 text-center" }, [
      _c("small", [_vm._v("© 2021 Keeuangan v1.0.0")])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-style-loader/index.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Profil.vue?vue&type=style&index=0&id=74bc7a1b&scoped=true&lang=css&":
/*!*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-style-loader/index.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Profil.vue?vue&type=style&index=0&id=74bc7a1b&scoped=true&lang=css& ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(/*! !!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./Profil.vue?vue&type=style&index=0&id=74bc7a1b&scoped=true&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/Profil.vue?vue&type=style&index=0&id=74bc7a1b&scoped=true&lang=css&");
if(content.__esModule) content = content.default;
if(typeof content === 'string') content = [[module.id, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var add = __webpack_require__(/*! !../../../node_modules/vue-style-loader/lib/addStylesClient.js */ "./node_modules/vue-style-loader/lib/addStylesClient.js").default
var update = add("66dcc29d", content, false, {});
// Hot Module Replacement
if(false) {}

/***/ })

}]);