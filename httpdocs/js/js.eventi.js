function validaridioma(idioma){
    if (idioma==='ru'||idioma==='it'||idioma==='en'||idioma==='fr'){
         return idioma;
    }else {
       
          return 'it';
    }
}
$('nav#mmovil').mmenu();
var idioma = Tools.extraerUrl().idioma;
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
var it = "";
//alert(idioma);
switch(idioma){
	case "it":
		var it = "Mostrare Altro";
		break;
		case "fr":
			var it = "Voir Plus";
			break;
			case "en":
				var it = "Show More";
				break;
				case "ru":
					var it = "узнать больше";
					break;

}

//paloma-> instancio la funcion validaridioma()
var templateNoticia = '<div class="col-sm-4"><div><a href="%url%" class="enlace-noticia"><img src="%img%" class="img-responsive" alt=""><span class=" textoB">%nombre%</strong></span><br><span class="gris fecha">%fecha%</span><span class="text-left flechita "><img src="/images/dd.png" alt=""></span><div class="clearfix"></div></a></div></div>';

var bot = '<div class="col-sm-2 " ></div><div class="col-sm-2 " ></div><div class="col-sm-4" style="height:76px"><div id="boton" class="col-sm-2" style="background: #C9840D none repeat scroll 0px 0px; color: #FFF;font-size: 11px;margin-bottom: 25px;margin-top: 25px;padding: 20px 30px;text-transform: uppercase;text-align: center;cursor: pointer;">'+it+'</div></div>';

function parseDate(input) {
  var parts = input.match(/(\d+)/g);
  // new Date(year, month [, date [, hours[, minutes[, seconds[, ms]]]]])
  return new Date(parts[0], parts[1]-1, parts[2], parts[3], parts[4], parts[5]); //     months are 0-based
}

Tools.cargarPrincipal({
	url: '//services.sanremo-on.com/service/eventos/format/json',
	method: 'get',
	json: true,
	callback: function(rr) {
		//carga 9 publicaciones nada mas.
		for (var i = 0; i < 9; i++) {

			var item = rr[i];
			var points = item.fechainicio;
			//points.sort(function(a, b){return a-b});
			var fe = points.substr(0,10);
			var fa = fe.split('/');
			console.log(fa);
			

			console.log(item.fechainicio);
			var elemento = '';

			fecha = item.fechafin.trim().split('-');
			f1 = fecha[0].trim().split('/');
			f2 = fecha[1].trim().split('/');
			newfecha = f1[1] + '/' + f1[0] + '/' + f1[2] + ' - ' + f2[1] + '/' + f2[0] + '/' + f2[2];
			
			elemento = templateNoticia.replace('%img%', '//admin.sanremo-on.com/public/uploads/evento/' + item.fotogrid);
			elemento = elemento.replace('%nombre%', JSON.parse(item.nombre)[validaridioma(idioma)]);
			elemento = elemento.replace('%fecha%', newfecha);
			elemento = elemento.replace('%url%', '//sanremo-on.com/'+validaridioma(idioma)+'/news/eventi/' + JSON.parse(item.url)[validaridioma(idioma)] + '.html');
			$('.row.resultados').append(elemento);
		};

		$('.row.resultados').append(bot);
		if(rr.length < 9)
		{
			$('#boton').css('display', 'none');
		}


			//Al dar clic en boton "cargar Más" en eventi.html vuelve a hacer la llamada y carga todos los eventos.
		$( "#boton" ).click(function() {
			$(".col-sm-2").css('display', 'none');
			$(".col-sm-4").css('display', 'none');
			$("#boton").css('display', 'none');
			for (var i = 0; i < rr.length; i++) {
				var item = rr[i];
				var elemento = '';
				fecha = item.fechafin.trim().split('-');
							f1 = fecha[0].trim().split('/');
							f2 = fecha[1].trim().split('/');
							newfecha = f1[1] + '/' + f1[0] + '/' + f1[2] + ' - ' + f2[1] + '/' + f2[0] + '/' + f2[2];
				elemento = templateNoticia.replace('%img%', '//admin.sanremo-on.com/public/uploads/evento/' + item.fotogrid);
				elemento = elemento.replace('%nombre%', JSON.parse(item.nombre)[validaridioma(idioma)]);
				elemento = elemento.replace('%fecha%', newfecha);
				elemento = elemento.replace('%url%', '//sanremo-on.com/'+validaridioma(idioma)+'/news/eventi/' + JSON.parse(item.url)[validaridioma(idioma)] + '.html');
				$('.row.resultados').append(elemento);
			};
		  
		});

	},
	error: function() {}
});