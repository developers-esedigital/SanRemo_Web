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
$('.mmenuSec.Mextras').on('click', function(evt) {
	evt.preventDefault();
	if ($(this).hasClass('mmenuSecHovered')) {
		$('#' + $(this).data('submenu')).hide('slow');
		$(this).toggleClass('mmenuSecHovered');
	} else {
		$('#' + $(this).data('submenu')).show('slow');
		$(this).toggleClass('mmenuSecHovered');
	}
	return false;
});

// $('.Mextras').on('mouseover', function() {
// 	$('.extras').show('fast');
// 	$(this).toggleClass('mmenuSecHovered');
// }).on('mouseleave', function() {
// 	if (!$('.extras').is(':hover')) {
// 		$('.extras').hide('fast');
// 	}
// });

// $('.extras').on('mouseenter', function() {
// 	$('.Mextras').toggleClass('mmenuSecHovered');
// }).on('mouseleave', function() {
// 	if (!$('.Mextras').is(':hover')) {
// 		$('.Mextras').toggleClass('mmenuSecHovered');
// 		$(this).slideUp('fast');
// 	}
// });

$('.slider-principal').fractionSlider({
	'fullWidth': true,
	'controls': false,
	'pager': false,
	'responsive': true,
	'dimensions': "1214,390",
	'timeout': 3000, // default timeout before switching slides
	'speedIn': 1000, // default in - transition speed
	// 'speedOut' : 0, // default out - transition speed
	'increase': false,
	'pauseOnHover': false,
	'slideEndAnimation': true,
	'backgroundAnimation': false,
	// 'backgroundElement' : 
});
$('.slider-principal-movil').fractionSlider({
	'fullWidth': true,
	'controls': false,
	'pager': false,
	'responsive': true,
	'dimensions': "402,179",
	'timeout': 3000, // default timeout before switching slides
	'speedIn': 1000, // default in - transition speed
	// 'speedOut' : 0, // default out - transition speed
	'increase': false,
	'pauseOnHover': false,
	'slideEndAnimation': true,
	'backgroundAnimation': false,
	// 'backgroundElement' : 
});
$('.slider-banner').fractionSlider({
	'fullWidth': true,
	'controls': true,
	'pager': true,
	'responsive': true,
	'dimensions': "940,195",
	'increase': true,
	// 'slideTransitionSpeed' : 10,
	// 'timeout' : 3000, // default timeout before switching slides
	'speedIn': 500, // default in - transition speed
	// 'speedOut' : 500, // default out - transition speed
	'pauseOnHover': true,
	'slideEndAnimation': true,
	'backgroundAnimation': false,
	'autoChange': false
		// 'backgroundElement' : 
});
$('.slider-banner-movil').fractionSlider({
	'fullWidth': false,
	'controls': true,
	'pager': true,
	'responsive': true,
	'dimensions': "300,500",
	'increase': true,
	// 'slideTransitionSpeed' : 10,
	// 'timeout' : 3000, // default timeout before switching slides
	'speedIn': 500, // default in - transition speed
	// 'speedOut' : 500, // default out - transition speed
	'pauseOnHover': true,
	'slideEndAnimation': true,
	'backgroundAnimation': false,
	'autoChange': false
		// 'backgroundElement' : 
});
var idioma = Tools.extraerUrl().idioma;
var templateNoticia = '<div class="col-sm-4"><div><a href="%url%" class="enlace-noticia"><img src="%img%" class="img-responsive" alt=""><span class=" textoB">%nombre%</strong></span><br><span class="gris fecha">%fecha%</span><span class="text-left flechita "><img src="/images/dd.png" alt=""></span><div class="clearfix"></div></a></div></div>';
Tools.cargarPrincipal({
	url: '//services.sanremo-on.com/service/noticias/format/json',
	method: 'get',
	json: true,
	callback: function(rr) {
		for (var i = 0; i < rr.length; i++) {
			var item = rr[i];
			var elemento = '';
			fecha = item.fechainicio.trim();
			f1 = fecha.trim().split('/');
			// f2 = fecha[1].trim().split('/');
			newfecha = f1[1] + '/' + f1[0] + '/' + f1[2];
			elemento = templateNoticia.replace('%img%', '//admin.sanremo-on.com/public/uploads/noticia/' + item.imagengrid);
			elemento = elemento.replace('%nombre%', JSON.parse(item.nombre)[validaridioma(idioma)]);
			elemento = elemento.replace('%fecha%', newfecha);
			if(item.nomMicro)
				elemento = elemento.replace('%url%', '//sanremo-on.com/'+validaridioma(idioma)+'/news/attualita/'+Tools.clearStr(JSON.parse(item.nomMicro)[validaridioma(idioma)]).toLowerCase()+'/' + JSON.parse(item.url)[validaridioma(idioma)] + '.html');
			else
				elemento = elemento.replace('%url%', '//sanremo-on.com/'+validaridioma(idioma)+'/news/attualita/' + JSON.parse(item.url)[validaridioma(idioma)] + '.html');
			$('.row.resultados').append(elemento);
		};
	},
	error: function() {}
});