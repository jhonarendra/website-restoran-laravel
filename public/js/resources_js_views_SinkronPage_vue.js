(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_views_SinkronPage_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/NavBar.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/NavBar.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
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
    return {};
  },
  props: {
    brandType: {
      type: String,
      "default": function _default() {}
    },
    pageTitle: {
      type: String,
      "default": function _default() {}
    },
    brandAction: {
      type: String,
      "default": function _default() {}
    },
    brandLink: {
      type: String,
      "default": function _default() {}
    }
  },
  methods: {
    brandClick: function brandClick() {
      if (this.brandAction === 'router-link') {
        this.$router.push({
          path: '/' + this.brandLink
        });
      }
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/SinkronPage.vue?vue&type=script&lang=js&":
/*!*************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/SinkronPage.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.for-each.js */ "./node_modules/core-js/modules/es.array.for-each.js");
/* harmony import */ var core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/web.dom-collections.for-each.js */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_date_to_string_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.date.to-string.js */ "./node_modules/core-js/modules/es.date.to-string.js");
/* harmony import */ var core_js_modules_es_date_to_string_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_date_to_string_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _components_NavBar_vue__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./../components/NavBar.vue */ "./resources/js/components/NavBar.vue");



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
      isLoading: true,
      tab: 'riwayat',
      keuangan: [],
      dompet: [],
      kategori: [],
      anggaran: [],
      riwayat: []
    };
  },
  components: {
    NavBar: _components_NavBar_vue__WEBPACK_IMPORTED_MODULE_3__.default
  },
  methods: {
    setTab: function setTab(val) {
      this.tab = val;
    },
    sinkron: function sinkron() {
      var _this = this;

      var data = {
        keuangan: this.keuangan,
        dompet: this.dompet,
        kategori: this.kategori,
        anggaran: this.anggaran
      };
      data = JSON.stringify(data);
      var form = new FormData();
      form.append('data', data);
      this.$store.dispatch('sinkronData', form).then(function (res) {
        if (res.data.status) {
          _this.$store.dispatch('updateLocalData').then(function (e) {
            if (e.status) {
              alert(e.msg);
              window.location = '/app/sinkron_data';
            } else {
              console.log(e.msg);
            }
          });
        } else {
          console.log(res.data.msg);
        }
      });
    },
    getRiwayat: function getRiwayat() {
      var _this2 = this;

      this.$store.dispatch('fetchDataSinkron').then(function (res) {
        if (res.data.status) {
          var riwayat = [];
          res.data.data.forEach(function (e) {
            var jsonData = JSON.parse(e.data);
            var strCountData = '';
            strCountData += jsonData.keuangan.length ? jsonData.keuangan.length + ' transaksi, ' : '';
            strCountData += jsonData.dompet.length ? jsonData.dompet.length + ' dompet, ' : '';
            strCountData += jsonData.kategori.length ? jsonData.kategori.length + ' kategori, ' : '';
            strCountData += jsonData.anggaran.length ? jsonData.anggaran.length + ' anggaran, ' : '';
            var dateTanggal = new Date(e.created_at);
            var strTanggal = dateTanggal.toLocaleDateString('id-ID', {
              year: 'numeric',
              month: 'long',
              day: 'numeric'
            });
            strTanggal += ' ';
            strTanggal += dateTanggal.getHours() < 10 ? '0' + dateTanggal.getHours() : dateTanggal.getHours();
            strTanggal += ':';
            strTanggal += dateTanggal.getMinutes() < 10 ? '0' + dateTanggal.getMinutes() : dateTanggal.getMinutes();
            strTanggal += ':';
            strTanggal += dateTanggal.getSeconds() < 10 ? '0' + dateTanggal.getSeconds() : dateTanggal.getSeconds();
            riwayat.push({
              id_sinkron: e.id_sinkron,
              id_user: e.id_user,
              created_at: e.created_at,
              strTanggal: strTanggal,
              data: jsonData,
              strCountData: strCountData
            });
          });
          _this2.riwayat = riwayat;
          _this2.isLoading = false;
        } else {
          console.log(res.data.msg);
        }
      });
    },
    getBelumSinkron: function getBelumSinkron() {
      var _this3 = this;

      this.$store.dispatch('fetchDataBelumSinkron').then(function (res) {
        if (res.status) {
          // console.log(res.data)
          _this3.keuangan = res.data.transaksi;
          _this3.dompet = res.data.dompet;
          _this3.kategori = res.data.kategori;
          _this3.anggaran = res.data.anggaran;
        } else {
          console.log(res.msg);
        }
      });
    }
  },
  created: function created() {
    this.getRiwayat();
    this.getBelumSinkron();
  }
});

/***/ }),

/***/ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/SinkronPage.vue?vue&type=style&index=0&id=7876b73e&scoped=true&lang=css&":
/*!*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/SinkronPage.vue?vue&type=style&index=0&id=7876b73e&scoped=true&lang=css& ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
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
___CSS_LOADER_EXPORT___.push([module.id, "\n#sinkron_page[data-v-7876b73e] {\n\twidth: 100%;\n\t-webkit-animation: slideIn .5s;\n\t        animation: slideIn .5s;\n}\n.sinkron-content[data-v-7876b73e] {\n\tfont-size: .8em;\n}\n.nav-item[data-v-7876b73e] {\n\tborder-bottom: 2px solid transparent;\n\tpadding: 10px;\n\tcursor: pointer;\n\ttransition: all .3s;\n}\n.nav-item.active[data-v-7876b73e], .nav-item[data-v-7876b73e]:hover {\n\tborder-bottom: 2px solid #673AB7;\n}\n", ""]);
// Exports
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (___CSS_LOADER_EXPORT___);


/***/ }),

/***/ "./resources/js/components/NavBar.vue":
/*!********************************************!*\
  !*** ./resources/js/components/NavBar.vue ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _NavBar_vue_vue_type_template_id_5dd24bca_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./NavBar.vue?vue&type=template&id=5dd24bca&scoped=true& */ "./resources/js/components/NavBar.vue?vue&type=template&id=5dd24bca&scoped=true&");
/* harmony import */ var _NavBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./NavBar.vue?vue&type=script&lang=js& */ "./resources/js/components/NavBar.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _NavBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _NavBar_vue_vue_type_template_id_5dd24bca_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _NavBar_vue_vue_type_template_id_5dd24bca_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "5dd24bca",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/NavBar.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/views/SinkronPage.vue":
/*!********************************************!*\
  !*** ./resources/js/views/SinkronPage.vue ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _SinkronPage_vue_vue_type_template_id_7876b73e_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./SinkronPage.vue?vue&type=template&id=7876b73e&scoped=true& */ "./resources/js/views/SinkronPage.vue?vue&type=template&id=7876b73e&scoped=true&");
/* harmony import */ var _SinkronPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./SinkronPage.vue?vue&type=script&lang=js& */ "./resources/js/views/SinkronPage.vue?vue&type=script&lang=js&");
/* harmony import */ var _SinkronPage_vue_vue_type_style_index_0_id_7876b73e_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./SinkronPage.vue?vue&type=style&index=0&id=7876b73e&scoped=true&lang=css& */ "./resources/js/views/SinkronPage.vue?vue&type=style&index=0&id=7876b73e&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");



;


/* normalize component */

var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__.default)(
  _SinkronPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _SinkronPage_vue_vue_type_template_id_7876b73e_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _SinkronPage_vue_vue_type_template_id_7876b73e_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "7876b73e",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/views/SinkronPage.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/NavBar.vue?vue&type=script&lang=js&":
/*!*********************************************************************!*\
  !*** ./resources/js/components/NavBar.vue?vue&type=script&lang=js& ***!
  \*********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_NavBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./NavBar.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/NavBar.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_NavBar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/views/SinkronPage.vue?vue&type=script&lang=js&":
/*!*********************************************************************!*\
  !*** ./resources/js/views/SinkronPage.vue?vue&type=script&lang=js& ***!
  \*********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SinkronPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./SinkronPage.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/SinkronPage.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_SinkronPage_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/NavBar.vue?vue&type=template&id=5dd24bca&scoped=true&":
/*!***************************************************************************************!*\
  !*** ./resources/js/components/NavBar.vue?vue&type=template&id=5dd24bca&scoped=true& ***!
  \***************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NavBar_vue_vue_type_template_id_5dd24bca_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NavBar_vue_vue_type_template_id_5dd24bca_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_NavBar_vue_vue_type_template_id_5dd24bca_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./NavBar.vue?vue&type=template&id=5dd24bca&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/NavBar.vue?vue&type=template&id=5dd24bca&scoped=true&");


/***/ }),

/***/ "./resources/js/views/SinkronPage.vue?vue&type=template&id=7876b73e&scoped=true&":
/*!***************************************************************************************!*\
  !*** ./resources/js/views/SinkronPage.vue?vue&type=template&id=7876b73e&scoped=true& ***!
  \***************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SinkronPage_vue_vue_type_template_id_7876b73e_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SinkronPage_vue_vue_type_template_id_7876b73e_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_SinkronPage_vue_vue_type_template_id_7876b73e_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./SinkronPage.vue?vue&type=template&id=7876b73e&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/SinkronPage.vue?vue&type=template&id=7876b73e&scoped=true&");


/***/ }),

/***/ "./resources/js/views/SinkronPage.vue?vue&type=style&index=0&id=7876b73e&scoped=true&lang=css&":
/*!*****************************************************************************************************!*\
  !*** ./resources/js/views/SinkronPage.vue?vue&type=style&index=0&id=7876b73e&scoped=true&lang=css& ***!
  \*****************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_style_loader_index_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_SinkronPage_vue_vue_type_style_index_0_id_7876b73e_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-style-loader/index.js!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./SinkronPage.vue?vue&type=style&index=0&id=7876b73e&scoped=true&lang=css& */ "./node_modules/vue-style-loader/index.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/SinkronPage.vue?vue&type=style&index=0&id=7876b73e&scoped=true&lang=css&");
/* harmony import */ var _node_modules_vue_style_loader_index_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_SinkronPage_vue_vue_type_style_index_0_id_7876b73e_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_vue_style_loader_index_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_SinkronPage_vue_vue_type_style_index_0_id_7876b73e_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ var __WEBPACK_REEXPORT_OBJECT__ = {};
/* harmony reexport (unknown) */ for(const __WEBPACK_IMPORT_KEY__ in _node_modules_vue_style_loader_index_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_SinkronPage_vue_vue_type_style_index_0_id_7876b73e_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== "default") __WEBPACK_REEXPORT_OBJECT__[__WEBPACK_IMPORT_KEY__] = () => _node_modules_vue_style_loader_index_js_node_modules_css_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_dist_cjs_js_clonedRuleSet_9_0_rules_0_use_2_node_modules_vue_loader_lib_index_js_vue_loader_options_SinkronPage_vue_vue_type_style_index_0_id_7876b73e_scoped_true_lang_css___WEBPACK_IMPORTED_MODULE_0__[__WEBPACK_IMPORT_KEY__]
/* harmony reexport (unknown) */ __webpack_require__.d(__webpack_exports__, __WEBPACK_REEXPORT_OBJECT__);


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/NavBar.vue?vue&type=template&id=5dd24bca&scoped=true&":
/*!******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/NavBar.vue?vue&type=template&id=5dd24bca&scoped=true& ***!
  \******************************************************************************************************************************************************************************************************************************/
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
  return _c(
    "nav",
    { staticClass: "navbar navbar-expand-lg navbar-light container" },
    [
      _c("a", { staticClass: "navbar-brand", attrs: { href: "#" } }, [
        _vm.brandType == "img"
          ? _c("img", {
              attrs: { src: "/favicon.svg", width: "30", height: "30", alt: "" }
            })
          : _vm._e(),
        _vm._v(" "),
        _vm.brandType == "svg"
          ? _c(
              "svg",
              {
                staticClass: "svg-chevron-left",
                attrs: { viewBox: "0 0 24 24" },
                on: {
                  click: function($event) {
                    return _vm.brandClick()
                  }
                }
              },
              [_c("path", { attrs: { d: "" } })]
            )
          : _vm._e(),
        _vm._v(" "),
        _vm.pageTitle
          ? _c("span", { staticClass: "h5" }, [
              _vm._v("\n\t\t\t" + _vm._s(_vm.pageTitle) + "\n\t\t")
            ])
          : _vm._e()
      ])
    ]
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/SinkronPage.vue?vue&type=template&id=7876b73e&scoped=true&":
/*!******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/SinkronPage.vue?vue&type=template&id=7876b73e&scoped=true& ***!
  \******************************************************************************************************************************************************************************************************************************/
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
  return _c(
    "div",
    { attrs: { id: "sinkron_page" } },
    [
      _c("NavBar", {
        attrs: {
          brandType: "svg",
          pageTitle: "Sinkron Data",
          brandAction: "router-link",
          brandLink: "profil"
        }
      }),
      _vm._v(" "),
      _c("div", { staticClass: "container sinkron-content" }, [
        _c("div", { staticClass: "row pb-3 m-0" }, [
          _c(
            "div",
            {
              staticClass: "col text-center nav-item",
              class: { active: _vm.tab === "riwayat" },
              on: {
                click: function($event) {
                  return _vm.setTab("riwayat")
                }
              }
            },
            [_vm._v("\n\t\t\t\t\tRiwayat\n\t\t\t\t")]
          ),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "col text-center nav-item",
              class: { active: _vm.tab === "data" },
              on: {
                click: function($event) {
                  return _vm.setTab("data")
                }
              }
            },
            [_vm._v("\n\t\t\t\t\tData belum sinkron\n\t\t\t\t")]
          )
        ]),
        _vm._v(" "),
        _vm.tab === "riwayat"
          ? _c("div", [
              _vm.isLoading
                ? _c("div", { staticClass: "list-group mt-3" }, [_vm._m(0)])
                : _vm._e(),
              _vm._v(" "),
              _vm.riwayat.length === 0 && !_vm.isLoading
                ? _c("div", { staticClass: "mt-3" }, [_vm._m(1)])
                : _vm._e(),
              _vm._v(" "),
              _vm.riwayat.length && !_vm.isLoading
                ? _c("div", { staticClass: "mt-3" }, [
                    _c(
                      "div",
                      { staticClass: "list-group mt-3" },
                      _vm._l(_vm.riwayat, function(r) {
                        return _c(
                          "a",
                          {
                            key: r.id_sinkron,
                            staticClass:
                              "\n                            list-group-item\n                            list-group-item-action p-2"
                          },
                          [
                            _c(
                              "div",
                              {
                                staticClass: "row",
                                staticStyle: { width: "calc(100% + 10px)" }
                              },
                              [
                                _c("div", { staticClass: "col-sm-4" }, [
                                  _c("b", [_vm._v(_vm._s(r.strTanggal))])
                                ]),
                                _vm._v(" "),
                                _c("div", { staticClass: "col-sm-4" }, [
                                  _c("small", [_vm._v(_vm._s(r.strCountData))])
                                ]),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  { staticClass: "col-sm-4 text-right pr-0" },
                                  [
                                    _c(
                                      "svg",
                                      {
                                        staticClass:
                                          "svg-check-circle svg-fill-success",
                                        attrs: { viewBox: "0 0 24 24" }
                                      },
                                      [_c("path", { attrs: { d: "" } })]
                                    )
                                  ]
                                )
                              ]
                            )
                          ]
                        )
                      }),
                      0
                    )
                  ])
                : _vm._e()
            ])
          : _vm._e(),
        _vm._v(" "),
        _vm.tab === "data"
          ? _c("div", [
              !_vm.keuangan.length &&
              !_vm.dompet.length &&
              !_vm.kategori.length &&
              !_vm.anggaran.length
                ? _c("div", { staticClass: "mt-3" }, [_vm._m(2)])
                : _vm._e(),
              _vm._v(" "),
              _vm.keuangan.length
                ? _c("div", { staticClass: "mt-3" }, [
                    _vm._m(3),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass: "list-group mt-3",
                        staticStyle: { "max-height": "300px", overflow: "auto" }
                      },
                      _vm._l(_vm.keuangan, function(k) {
                        return _c(
                          "a",
                          {
                            key: k.id_keuangan,
                            staticClass:
                              "\n                            list-group-item\n                            list-group-item-action p-2"
                          },
                          [
                            _c(
                              "div",
                              {
                                staticClass: "row",
                                staticStyle: { width: "calc(100% + 10px)" }
                              },
                              [
                                _c("div", { staticClass: "col-6" }, [
                                  _c("b", [_vm._v(_vm._s(k.kategori.nama))]),
                                  _c("br"),
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(k.uraian)
                                  ),
                                  _c("br"),
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(k.tanggan)
                                  ),
                                  _c("br"),
                                  _vm._v(" "),
                                  _c("small", [
                                    _c("i", [_vm._v(_vm._s(k.created_at))])
                                  ])
                                ]),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  { staticClass: "col-2 text-center" },
                                  [
                                    _vm._v(
                                      "\n                                    " +
                                        _vm._s(k.debet > 0 ? "D" : "K") +
                                        "\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  { staticClass: "col-4 pr-0 text-right" },
                                  [
                                    _vm._v(
                                      "\n                                    " +
                                        _vm._s(
                                          k.debet > 0
                                            ? Number(
                                                k.debet.toFixed(2)
                                              ).toLocaleString()
                                            : Number(
                                                k.kredit.toFixed(2)
                                              ).toLocaleString()
                                        ) +
                                        "\n                                "
                                    )
                                  ]
                                )
                              ]
                            )
                          ]
                        )
                      }),
                      0
                    )
                  ])
                : _vm._e(),
              _vm._v(" "),
              _vm.dompet.length
                ? _c("div", { staticClass: "mt-3" }, [
                    _vm._m(4),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass: "list-group mt-3",
                        staticStyle: { "max-height": "300px", overflow: "auto" }
                      },
                      _vm._l(_vm.dompet, function(d) {
                        return _c(
                          "a",
                          {
                            key: d.id_dompet,
                            staticClass:
                              "\n                            list-group-item\n                            list-group-item-action p-2"
                          },
                          [
                            _vm._v(
                              "\n                            " + _vm._s(d.nama)
                            ),
                            _c("br"),
                            _vm._v(" "),
                            _c("small", [
                              _c("i", [_vm._v(_vm._s(d.created_at))])
                            ])
                          ]
                        )
                      }),
                      0
                    )
                  ])
                : _vm._e(),
              _vm._v(" "),
              _vm.kategori.length
                ? _c("div", { staticClass: "mt-3" }, [
                    _vm._m(5),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass: "list-group mt-3",
                        staticStyle: { "max-height": "300px", overflow: "auto" }
                      },
                      _vm._l(_vm.kategori, function(k) {
                        return _c(
                          "a",
                          {
                            key: k.id_kategori,
                            staticClass:
                              "\n                            list-group-item\n                            list-group-item-action p-2"
                          },
                          [
                            _vm._v(
                              "\n                            " + _vm._s(k.nama)
                            ),
                            _c("br"),
                            _vm._v(" "),
                            _c("small", [
                              _c("i", [_vm._v(_vm._s(k.created_at))])
                            ])
                          ]
                        )
                      }),
                      0
                    )
                  ])
                : _vm._e(),
              _vm._v(" "),
              _vm.anggaran.length
                ? _c("div", { staticClass: "mt-3" }, [
                    _vm._m(6),
                    _vm._v(" "),
                    _c(
                      "div",
                      {
                        staticClass: "list-group mt-3",
                        staticStyle: { "max-height": "300px", overflow: "auto" }
                      },
                      _vm._l(_vm.anggaran, function(a) {
                        return _c(
                          "a",
                          {
                            key: a.id_anggaran,
                            staticClass:
                              "\n                            list-group-item\n                            list-group-item-action p-2"
                          },
                          [
                            _c(
                              "div",
                              {
                                staticClass: "row",
                                staticStyle: { width: "calc(100% + 10px)" }
                              },
                              [
                                _c("div", { staticClass: "col-4" }, [
                                  _c("b", [_vm._v(_vm._s(a.kategori.nama))]),
                                  _c("br"),
                                  _vm._v(
                                    "\n                                    " +
                                      _vm._s(
                                        a.tahun != 0
                                          ? a.bulan != 0
                                            ? "Anggaran Bulan"
                                            : "Anggaran Tahun"
                                          : "Anggaran Semua"
                                      )
                                  ),
                                  _c("br"),
                                  _vm._v(" "),
                                  _c("small", [
                                    _c("i", [_vm._v(_vm._s(a.created_at))])
                                  ])
                                ]),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  { staticClass: "col-4 text-center" },
                                  [
                                    _vm._v(
                                      "\n                                    " +
                                        _vm._s(
                                          a.tahun != 0
                                            ? a.bulan != 0
                                              ? a.bulan + " " + a.tahun
                                              : a.tahun
                                            : ""
                                        ) +
                                        "\n                                "
                                    )
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  { staticClass: "col-4 pr-0 text-right" },
                                  [
                                    _vm._v(
                                      "\n                                    " +
                                        _vm._s(
                                          Number(
                                            a.nominal.toFixed(2)
                                          ).toLocaleString()
                                        ) +
                                        "\n                                "
                                    )
                                  ]
                                )
                              ]
                            )
                          ]
                        )
                      }),
                      0
                    )
                  ])
                : _vm._e(),
              _vm._v(" "),
              _vm.keuangan.length ||
              _vm.dompet.length ||
              _vm.kategori.length ||
              _vm.anggaran.length
                ? _c("div", { staticClass: "mt-3 text-center" }, [
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-sm btn-purple",
                        on: { click: _vm.sinkron }
                      },
                      [_vm._v("Sinkron Data ke Cloud")]
                    )
                  ])
                : _vm._e()
            ])
          : _vm._e()
      ])
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "a",
      {
        staticClass:
          "\n                        list-group-item\n                        list-group-item-action p-2"
      },
      [
        _c(
          "div",
          { staticClass: "row", staticStyle: { width: "calc(100% + 10px)" } },
          [
            _c("div", { staticClass: "col-sm-4" }, [
              _c("b", { staticClass: "content-loader" }, [_vm._v("Loading")])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col-sm-4" }, [
              _c("small", { staticClass: "content-loader" }, [
                _vm._v("Loading")
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "col-sm-4 text-right pr-0" })
          ]
        )
      ]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("p", { staticClass: "text-center" }, [
      _c("b", [_vm._v("Belum ada data sinkronisasi")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("p", { staticClass: "text-center" }, [
      _c("b", [_vm._v("Semua data telah disinkron ke cloud")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("p", [_c("b", [_vm._v("Transaksi")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("p", [_c("b", [_vm._v("Dompet")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("p", [_c("b", [_vm._v("Kategori")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("p", [_c("b", [_vm._v("Anggaran")])])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-style-loader/index.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/SinkronPage.vue?vue&type=style&index=0&id=7876b73e&scoped=true&lang=css&":
/*!**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-style-loader/index.js!./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/SinkronPage.vue?vue&type=style&index=0&id=7876b73e&scoped=true&lang=css& ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((module, __unused_webpack_exports, __webpack_require__) => {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(/*! !!../../../node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./SinkronPage.vue?vue&type=style&index=0&id=7876b73e&scoped=true&lang=css& */ "./node_modules/css-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[1]!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/dist/cjs.js??clonedRuleSet-9[0].rules[0].use[2]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/views/SinkronPage.vue?vue&type=style&index=0&id=7876b73e&scoped=true&lang=css&");
if(content.__esModule) content = content.default;
if(typeof content === 'string') content = [[module.id, content, '']];
if(content.locals) module.exports = content.locals;
// add the styles to the DOM
var add = __webpack_require__(/*! !../../../node_modules/vue-style-loader/lib/addStylesClient.js */ "./node_modules/vue-style-loader/lib/addStylesClient.js").default
var update = add("0b931a5f", content, false, {});
// Hot Module Replacement
if(false) {}

/***/ })

}]);