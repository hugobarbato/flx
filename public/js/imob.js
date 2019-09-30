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

/***/ "./resources/js/imob.js":
/*!******************************!*\
  !*** ./resources/js/imob.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*global $*/
$(document).ready(function () {
  function calcularm2() {
    var area = $("#vl_area_util").val() ? $("#vl_area_util").val() : 0;
    var price = 0;

    if ($("#vl_imovel").val()) {
      price = $("#vl_imovel").val().replace(/\./g, '').replace(/,/g, '.');
    }

    var result = Number(price / area);

    if (result) {
      $("#vl_m2").val(result.toLocaleString('pt-BR', {
        style: 'currency',
        currency: 'BRL'
      }));
    } else {
      $("#vl_m2").val('R$ 0,00');
    }
  }

  $("#vl_area_util").change(calcularm2);
  $("#vl_imovel").change(calcularm2);
  calcularm2();
  $("#btn_pics").click(function () {
    $('#pics_imovel').click();
  });
  $("#pics_imovel").change(function (event) {
    if (this.files.length) {
      for (var i = 0; i < this.files.length; i++) {
        //for multiple files          
        (function (file) {
          var reader = new FileReader();
          $("#preview_list").html("");

          reader.onload = function (e) {
            var img = $('<img/>').attr('src', e.target.result);
            $(img).attr('width', "200");
            $("#preview_list").append(img);
          };

          reader.readAsDataURL(file);
        })(this.files[i]);
      }

      $("#pics_list").fadeIn();
    } else {
      $("#pics_list").hide();
    }
  });
  var cd_tipo_imovel_ativo = $("#cd_tipo_imovel :selected").parent().attr('value');
  $("#cd_tipo_imovel").change(function () {
    var new_tipo_imovel = $("#cd_tipo_imovel :selected").parent().attr('value');

    if (new_tipo_imovel != cd_tipo_imovel_ativo) {
      buscar_areas_tipo(new_tipo_imovel);
    }
  });

  function buscar_areas_tipo(tipo) {
    $(".area-privativa, .area-comuns").show();
    $("#AreasPrivativasChecks, #AreasComunsChecks").html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i> Carregando áreas.');
    $.get('/areas/obter_html/' + tipo).done(function (data) {
      if (data && 'privativas' in data && 'comuns' in data) {
        cd_tipo_imovel_ativo = tipo;
        $("#AreasPrivativasChecks").html(data['privativas']);
        $("#AreasComunsChecks").html(data['comuns']);
        check_areas_selecionadas();
      } else {
        console.info('Algo deu errado na request!!!');
      }
    });
  }

  function check_areas_selecionadas() {
    var privativas = $("#ds_areas_privativas").val();
    privativas = privativas.split(';');
    privativas.forEach(function (el) {
      $("#ap" + el).prop('checked', true);
    });
    var comuns = $("#ds_areas_comuns").val();
    comuns = comuns.split(';');
    comuns.forEach(function (el) {
      $("#ac" + el).prop('checked', true);
    });
  }

  $("#cd_tipo_anunciante").change(function () {
    if (this.value == "4") {
      $(".IncorporadoraFields").show();
      $(".logo-anunciante").text("anunciante");
      $(".video-anunciante").text("anunciante");
    } else if (this.value == "5") {
      $("#bloco_cadastro_imovel").hide();
      $(".dados-imovel").hide();
      $(".InputsValores").hide();
      $(".hotelFields").show();
      $(".principais-comodidades").show();
      $(".logo-anunciante").text("hotel");
      $(".video-anunciante").text("hotel");
    } else {
      $("#bloco_cadastro_imovel").show();
      $(".dados-imovel").show();
      $(".InputsValores").show();
      $(".IncorporadoraFields").hide();
      $(".hotelFields").hide();
      $(".principais-comodidades").hide();
    }
  });
  $("input[name='ic_valor_mensagem']").change(function () {
    if (!this.value) {
      $(".InputsValores").hide();
    } else {
      $(".InputsValores").show();
    }
  });
  $("#ic_status").change(function () {
    if (this.value == '4') {
      $("#dt_previsao_entrega").val('');
      $("#dt_previsao_entrega").prop('disabled', true);
    } else {
      $("#dt_previsao_entrega").prop('disabled', false);
    }
  });
});
$(document).ready(function () {
  var formato = {
    minimumFractionDigits: 2,
    style: 'currency',
    currency: 'BRL'
  };
  console.info("init");

  if (window.lrv_data) {
    console.info(window.lrv_data);
    $("#slider-range").slider({
      range: true,
      min: window.lrv_data.min,
      max: window.lrv_data.max + 1000,
      step: 1000,
      values: window.lrv_data.values,
      slide: function slide(event, ui) {
        var de = ui.values[0];
        var ate = ui.values[1];
        precoDe.value = Number(de).toLocaleString('pt-BR', formato);
        precoAte.value = Number(ate).toLocaleString('pt-BR', formato);
      }
    });
    precoDe.value = Number($("#slider-range").slider("values", 0)).toLocaleString('pt-BR', formato);
    precoAte.value = Number($("#slider-range").slider("values", 1)).toLocaleString('pt-BR', formato);
  } else {
    console.info(window.lrv_data);
  }

  $('.carousel').carousel({
    interval: 3000
  });
});

/***/ }),

/***/ 2:
/*!************************************!*\
  !*** multi ./resources/js/imob.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\projectflex\flx\resources\js\imob.js */"./resources/js/imob.js");


/***/ })

/******/ });