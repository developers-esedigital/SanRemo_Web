
//paloma-> funcion que controla el idioma de las paginas si no es uno de los instanciados pone por defecto italiano
function validaridioma(idioma){
    if (idioma==='ru'||idioma==='it'||idioma==='en'||idioma==='fr'){
         return idioma;
    }else {
       
          return 'it';
    }
}


$('nav#mmovil').mmenu();
$('.selectpicker').selectpicker({
	size: '50%'
});
$('.Mextras').on('click', function(evt) {
	evt.preventDefault();
	if ($(this).hasClass('mmenuSecHovered')) {
		$('#' + $(this).data('submenu')).fadeOut('normal');
		$(this).removeClass('mmenuSecHovered');
	} else {
		for (var f = 1; f < 6; f++) {
			$("#sub" + f).css('display', 'none');
		}
		$(".barraMenu ul li").each(function() {
			$(this).removeClass("mmenuSecHovered");
		});
		$('#' + $(this).data('submenu')).fadeIn('normal');
		$(this).addClass('mmenuSecHovered');
	}
	return false;
});
cambia = function(posicion) {
	for (var f = 1; f < 6; f++) {
		$("#sub" + f).css('display', 'none');
	}
	$(".barraMenu ul li").each(function(index) {
		$(this).removeClass("mmenuSecHovered");
		if (index === posicion) {
			$(this).addClass("mmenuSecHovered");
		}
	});

};
modifica = function(valor) {
	var mithis;
	var midata;
	if (valor > 0 && valor < 6) {
		var limite = 6;
		var inicio = 1;
	} else {
		var limite = 11;
		var inicio = 6;
	}

	for (var f = inicio; f < limite; f++) {
		$('#opcion' + f).css('display', 'none');

	}

	$('div.opcion').each(function(index) {
		//if (valor<6){
		if (index < 5) {
			$(this).attr('indice', index + 1);
		}
		// }else {
		if (index > 4) {
			$(this).attr('indice', index - 4);
		}
		// }

		if (index === (valor - 1)) {
			mithis = $(this);
			midata = mithis.data('opcion');
		} else {
			if (valor < 6) {
				if (index < 5) {
					$(this).removeClass('orange');
					$(this).children('.size-icon-mapa').removeClass('ico-orange').addClass('ico-black');
				}
			} else {
				if (index > 4) {
					$(this).removeClass('orange');
					$(this).children('.size-icon-mapa').removeClass('ico-orange').addClass('ico-black');
				}
			}
		}
	});

	$("#" + midata).css('display', 'block');
	mithis.addClass('orange');
	mithis.children('.size-icon-mapa').removeClass('ico-black').addClass('ico-orange');

}
var idioma = Tools.extraerUrl().idioma;
var templateOferta = '<div class="col-sm-6 offer img-ofert-iz"><div><a href="%src%" class="enlace-oferta"><div class="col-sm-7 col-xs-7 imagen-ofertas visible-xs"><img src="%img-res%" alt="" class="img-responsive"></div><div class="col-sm-7 col-xs-7 imagen-ofertas hidden-xs"><img class="img-responsive" alt="" src="%img%"></div><div class="col-sm-5 col-xs-5"><p class="f1"><i class="fa fa-tag"></i> Offerte</p><p class="f2">%nombre%</p><p class="f3">%microsite%</p><p class="descuento f3"><span class="percentual">%descuento% </span><span class="sconto %tt% hidden-xs hidden-ms">Sconto</span></p></div><div class="clearfix"></div></div></div>';
Tools.cargarPrincipal({
	url: '//services.sanremo-on.com/service/ofertas/format/json',
	method: 'get',
	json: true,
	callback: function(rr) {
		for (var i = 0; i < rr.length; i++) {
			var item = rr[i];
			var elemento = '';
			elemento = templateOferta.replace('%img%', '//admin.sanremo-on.com/public/uploads/ofertas/' + item.imagengrid);
			elemento = elemento.replace('%img-res%', '//admin.sanremo-on.com/public/uploads/ofertas/' + item.gridmovil);
			elemento = elemento.replace('%nombre%', JSON.parse(item.nombre)[validaridioma(idioma)]);
			elemento = elemento.replace('%href%','//sanremo-on.com/'+validaridioma(idioma)+'/news/offerte/'+Tools.clearStr(JSON.parse(item.idmicrosite.nombre)[validaridioma(idioma)]).toLowerCase()+'/'+ JSON.parse(item.url)[validaridioma(idioma)]+'.html');
			elemento = elemento.replace('%src%','//sanremo-on.com/'+validaridioma(idioma)+'/news/offerte/'+Tools.clearStr(JSON.parse(item.idmicrosite.nombre)[validaridioma(idioma)]).toLowerCase()+'/'+ JSON.parse(item.url)[validaridioma(idioma)]+'.html');
			elemento = elemento.replace('%microsite%', JSON.parse(item.idmicrosite.nombre)[validaridioma(idioma)]);
			elemento = elemento.replace('%descuento%', item.porcentaje !== '' ? item.porcentaje + '%' : '');
			elemento = elemento.replace('%tt%', item.porcentaje !== '' ? '' : 'hidden');
			
			$('.row.offerandnew').append(elemento);
		};
	},
	error: function() {}
});