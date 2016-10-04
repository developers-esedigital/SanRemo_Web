// Tools.corregirURL();
var idioma = Tools.extraerUrls().idioma;
$('nav#mmovil').mmenu();

$('.selectpicker').selectpicker({
	size: '50%'
});
$('.mmenuSec').on('click', function(evt) {
	evt.preventDefault();
	var me = $(this);
	if ($(this).hasClass('mmenuSecHovered')) {
		$('.mmenuSecHovered').toggleClass('mmenuSecHovered');
		$('.extras.container.active').removeClass('active');
		$('.extras.container').fadeOut('normal');
	} else {
		$('.mmenuSecHovered').toggleClass('mmenuSecHovered');
		$(this).toggleClass('mmenuSecHovered');
		if ($(this).hasClass('mmenuSecHovered')) {
			$('.extras.container.active').removeClass('active');
			$('.extras.container').fadeOut('normal')
			$('#' + $(this).data('submenu')).fadeIn('normal');
			$('#' + me.data('submenu')).addClass('active');
		} else {
			$('.extras.container.active').removeClass('active');
			$('.extras.container').fadeOut('normal');
		}
	}
	return false;
});
// $('.otro').on('click',function(){
// 	$('.mmenuSecHovered').toggleClass('mmenuSecHovered');
// 	$('.extras.container.active').fadeOut('normal');
// 	$('.extras.container.active').removeClass('active');
// 	$('.extras.container.active').removeClass('active');
// });




var changeImage = function() {
	if ($(window).width() >= 769 && $(window).width() <= 992) {
		$('.resultados .col-sm-3:nth-child(4n) img').css('height', '128px');
	} else {
		$('.resultados .col-sm-3:nth-child(4n) img').css('height', '164px');
	}
};
changeImage();
$(window).resize(function() {
	changeImage();
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
/*
1	Negozi
2	Ristoranti
3	Tempo Libero Benessere
4	Cinema e Spectacoli
5	Accomodation
*/
// [Object { idmicrosite="56",  iduser="38",  nombre="Franco",  más...}]


var helper = {
	'negozi': 'icon-negozi',
	'ristoranti-bar': 'icon-food-drink',
	'hotel': 'icon-iconos-03',
	'tempo-libero-e-benessere': 'icon-tempo-libero',
	'spettacoli-cinema': 'icon-cinema-e-spettacoli'
}
var cccc = {
	'negozi': 'Negozi',
	'ristoranti-bar': 'Food & Drink',
	'hotel': 'Accomodation',
	'tempo-libero-e-benessere': 'Tempo Libero',
	'spettacoli-cinema': 'Spettacoli e Cinema'
}
var template = '<div class="col-sm-3"><div><a href="' + Tools.getCategoria() + '/%id%.html" class="enlace-grid-microsite"><img src="%imagenMicrosite%" class="img-responsive hidden-xs" alt=""><span class="visible-xs textoB"><strong>%nombreMicrosite%</strong></span><span class="text-left flechita visible-xs">></span></a><div class="clearfix"></div></div></div>';

var variables = Tools.extraerCategoria();
if (variables.categoria == 1)
	$('#brandss').show();
// var variables = Tools.extraerVariables();
$('#iconopequenio').addClass(helper[Tools.getCategoria()]);
$('title').html(cccc[Tools.getCategoria()].replace(/-/gi, ' ').capitalize());
var idioma = Tools.extraerUrls().idioma;
var bread = '';
switch(idioma){
	case 'ru':
		bread = 'ЕДА&НАПИТКИ';
		break;
	default:
		bread = 'ristoranti-bar'
		break;
}

$('#breadCat').html(bread.capitalize());

// ccatt



var etiquetas = {
	it:{
		'filtrar':'FILTRA RISULTATI',
		'mostrar':'MOSTRARE ALTRO',
		'micrositeSinOferta':'Non ci sono Microsites con offerte',
		'sinMicrosites':'Non ci sono microsites',
		'sinMicrositesCategoria':'Non ci sono microsite presenti in questa categoria',
		'sinFavoritos':'Non hai microsite nei favoriti'
	},
	en:{
		'filtrar':'FILTER RESULTS',
		'mostrar':'SHOW MORE',
		'micrositeSinOferta':'There aren’t any microsites with offers',
		'sinMicrosites':'There aren’t any microsites',
		'sinMicrositesCategoria':'There aren’t any microsites in this category',
		'sinFavoritos':'There aren’t any favourites microsites'
	},
	fr:{
		'filtrar':'FILTRER LES RÉSULTATS',
		'mostrar':'Voir tout',
		'micrositeSinOferta':'Il n\'ya pas des microsites avec offres',
		'sinMicrosites':'Il n\'ya pas des microsites',
		'sinMicrositesCategoria':'Il n\'ya pas des microsites dans cette catégorie',
		'sinFavoritos':'Il n\'ya pas des microsites favoris'
	},
	ru:{
		'filtrar':'результаты фильтрации',
		'mostrar':'посмотреть все',
		'micrositeSinOferta':'Есть микросайты сделок',
		'sinMicrosites':'Есть микросайты',
		'sinMicrositesCategoria':'В этой категории есть микросайты',
		'sinFavoritos':'У вас нет микросайте Избранное'
	}

};

var button = '<div class="col-sm-12 text-center bus"><a href="" class="btn btn-success gris">'+etiquetas[idioma].filtrar+'</a></div><div class="clearfix"></div>';

var button2 = '<div id="mas" class="col-sm-12 text-center bus"><a style="background-color: #777776;border-color:#777776;color: #fff; border-radius: 1px; font-size:11px;" href="" class="btn btn-success gris2">'+etiquetas[idioma].mostrar+'</a></div><div class="clearfix"></div>';

var csubcat = '<div class="col-sm-3">%contenido%</div>';
var tsubcat = '<div class="checkbox"><label><input type="checkbox" value="%id%" name="subcats[]">%texto%</label></div>';

//funcion Fabian ordenar
function ascendenteMarcas(a, b) {
	if (a.nombre < b.nombre)
		return -1;
	if (a.nombre > b.nombre)
		return 1;
	return 0;
}

Tools.cargarPrincipal({
	url: '//services.sanremo-on.com/service/subcategorias/id/' + variables.categoria + '/format/json',
	method: 'get',
	json: true,
	callback: function(data, textStatus, xhr) {
		// for (var i = 0; i < data.length; i++) {
		// 	item = data[i];
		// 	if(parseInt(item.parent) == variables.categoria)
		// 		$('#ccatt').prepend(tsubcat.replace('%texto%', JSON.parse(item.nombre)[idioma]).replace('%id%', item.idcategoria))
		// };
		var html = '';
		itemporfila = Math.ceil(data.length / 4.0);
		var aux = 1;
		var innerhtml = '';
		data.mezclar();
		for (var i = 0; i < data.length; i++) {
			var item = data[i];
			if (aux == itemporfila) {
				innerhtml += tsubcat.replace('%texto%', JSON.parse(item.label)[idioma]).replace('%id%', item.id);
				$('#extras').append(cmarcas.replace('%contenido%', innerhtml));
				innerhtml = '';
				aux = 1;
			} else {
				innerhtml += tsubcat.replace('%texto%', JSON.parse(item.label)[idioma]).replace('%id%', item.id);
				aux++;
			}
			if (i == data.length - 1 && aux > 1) {
				$('#extras').append(cmarcas.replace('%contenido%', innerhtml));
			}
		};
		$('#extras').append(button);
		$('#extras .btn.btn-success.gris').on('click', function(e) {
			e.preventDefault();
			var categoria = variables.categoria;
			var subcat = [];
			$('#extras input[type="checkbox"]:checked').each(function(index, el) {
				subcat.push(el.value);
			});
			// console.log(categoria);
			// return false;
			var url = '//services.sanremo-on.com/service/micrositeCategoriaSubcategoria/cat/' + variables.categoria + '/subCat/' + subcat.join('-') + '/format/json'
			if (subcat.length == 0) {
				url = '//services.sanremo-on.com/service/micrositeCategoria/cat/' + variables.categoria + '/format/json';
			}
			Tools.cargarPrincipal({
				url: url,
				method: 'get',
				json: true,
				callback: function(data, textStatus, xhr) {
					var html = '';
					var desactivados = 0;
					data = Tools.mezclar(data);
					
					//for para traer todas las marcas
					for (var i = 0; i < data.length; i++) {
						var item = data[i];
						if (item.estatus == '1') {
							var ele = template;
							urls = JSON.parse(item.url);
							ele = ele.replace(/%id%/gi, urls[Tools.extraerUrls().idioma]);
							noms = JSON.parse(item.nombre);
							ele = ele.replace(/%imagenMicrosite%/gi, '//admin.sanremo-on.com/public/uploads/' + Tools.clearStr(noms['it']) + '/logo/' + CryptoJS.MD5(item.logogris).toString());
							ele = ele.replace(/%nombreMicrosite%/gi, noms[idioma]);
							html += ele;
						} else {
							desactivados++;
						}
					};
					console.log('desactivados : ' + desactivados);
					console.log('indice : ' + i);
					if (desactivados == i) {
						$('.row.resultados').html('<h3>'+etiquetas[idioma].sinMicrositesCategoria+'</h3>');
					} else {
						$('.row.resultados').html(html);
					}
					$('[data-field="categoria"]').html(Tools.getCategoriaLabel().replace(/-/gi, ' ').toUpperCase());
				},
				error: function() {
					$('.row.resultados').html('<h3>'+etiquetas[idioma].sinMicrositesCategoria+'</h3>');
					$('[data-field="categoria"]').html(Tools.getCategoriaLabel().replace(/-/gi, ' ').toUpperCase());

				}

			})
			$('[data-submenu="extras"]').click();
			$('#extras input[type="checkbox"]:checked').each(function() {
				this.checked = false;
			});
			return false;
		})
	},
	error: function() {}
});



$('#favoritos').on('click', function() {
	if (typeof window.usuario === "undefined") {
		$('[data-target="#login_panel"]').click();
		return false;
	}
	Tools.cargarPrincipal({
		url: '//services.sanremo-on.com/service/micrositefavoritos/user/' + window.usuario.iduser + '/format/json',
		method: 'get',
		json: true,
		callback: function(data, textStatus, xhr) {
			var html = '';
			var desactivados = 0;
			data = Tools.mezclar(data);
			for (var i = 0; i < data.length; i++) {
				var item = data[i];
				if (item.estatus == '1' && item.categoria == variables.categoria) {
					var ele = template;
					urls = JSON.parse(item.url);
					ele = ele.replace(/%id%/gi, urls[Tools.extraerUrls().idioma]);
					noms = JSON.parse(item.nombre);
					ele = ele.replace(/%imagenMicrosite%/gi, '//admin.sanremo-on.com/public/uploads/' + Tools.clearStr(noms['id']) + '/logo/' + CryptoJS.MD5(item.logogris).toString());
					ele = ele.replace(/%nombreMicrosite%/gi, noms[idioma]);
					html += ele;
				} else {
					desactivados++;
				}
			};
			console.log('desactivados : ' + desactivados);
			console.log('indice : ' + i);
			if (desactivados == i) {
				$('.row.resultados').html('<h3>'+etiquetas[idioma].sinFavoritos+'</h3>');
			} else {
				$('.row.resultados').html(html);
			}
			$('[data-field="categoria"]').html(Tools.getCategoriaLabel().replace(/-/gi, ' ').toUpperCase());
		},
		error: function() {
			$('.row.resultados').html('<h3>'+etiquetas[idioma].sinFavoritos+'</h3>');
			$('[data-field="categoria"]').html(Tools.getCategoriaLabel().replace(/-/gi, ' ').toUpperCase());

		}
	})
});

var cmarcas = '<div class="col-sm-3">%contenido%</div>';
var tmarcas = '<div class="checkbox"><label><input type="checkbox" value="%id%" name="marca[]">%texto%</label></div>';




Tools.cargarPrincipal({
	url: '//services.sanremo-on.com/service/marcas/format/json',
	method: 'get',
	json: true,
	callback: function(data, textStatus, xhr) {
         //paloma-> ordenar marcas
		data.sort(ascendenteMarcas);
       //console.log(data.sort(ascendenteMarcas));
       //data=gon(data);
       console.log(data);
		var html = '';
		itemporfila = 10;//Math.ceil(data.length / 16.0);
		var aux = 1;
		var innerhtml = '';
		//data.mezclar();

		//for para traer los checkbox de las marcas
		for (var i = 0; i < (data.length/4); i++) {
			var item = data[i];
			if (aux == itemporfila) {
				innerhtml += tmarcas.replace('%texto%', item.nombre).replace('%id%', item.idmarca);
				$('#extras2').append(cmarcas.replace('%contenido%', innerhtml));
				innerhtml = '';
				aux = 1;
			} else {
				innerhtml += tmarcas.replace('%texto%', item.nombre).replace('%id%', item.idmarca);
				aux++;
			}
			if (i == data.length - 1 && aux > 1) {
				$('#extras2').append(cmarcas.replace('%contenido%', innerhtml));
			}
		};

		

		$('#extras2').append(button);
		$('#extras2').append(button2);

		//boton 

		

		$('#mas').on('click', function(e) {
			$('#extras2').css('display', 'none');
			$('#extras2menos').css('display', 'block');


			e.preventDefault();
			/* Act on the event */
			Tools.cargarPrincipal({
				url: '//services.sanremo-on.com/service/marcas/format/json',
				method: 'get',
				json: true,
				callback: function(data, textStatus, xhr) {
			         //paloma-> ordenar marcas
					data.sort(ascendenteMarcas);
			       //console.log(data.sort(ascendenteMarcas));
			       //data=gon(data);
			       console.log(data);
					var html = '';
					itemporfila = Math.ceil(data.length / 16.0);
					var aux = 1;
					var innerhtml = '';
					//data.mezclar();

					//for para traer los checkbox de las marcas
					for (var i = 0; i < (data.length); i++) {
						var item = data[i];
						if (aux == itemporfila) {
							innerhtml += tmarcas.replace('%texto%', item.nombre).replace('%id%', item.idmarca);
							$('#extras2menos').append(cmarcas.replace('%contenido%', innerhtml));
							innerhtml = '';
							aux = 1;
						} else {
							innerhtml += tmarcas.replace('%texto%', item.nombre).replace('%id%', item.idmarca);
							aux++;
						}
						if (i == data.length - 1 && aux > 1) {
							$('#extras2').append(cmarcas.replace('%contenido%', innerhtml));
						}
					};

					

					$('#extras2menos').append(button);
					$('#extras2menos .btn.btn-success.gris').on('click', function(e) {
						e.preventDefault();
						var categoria = variables.categoria;
						var marcas = [];
						$('#extras2menos input[type="checkbox"]:checked').each(function(index, el) {
							marcas.push(el.value);
						});
						var url = '//services.sanremo-on.com/service/micrositeMarcaCategoria/cat/' + variables.categoria + '/marca/' + marcas.join('-') + '/format/json'
						if (marcas.length == 0) {
							url = '//services.sanremo-on.com/service/micrositeCategoria/cat/' + variables.categoria + '/format/json';
						}
						Tools.cargarPrincipal({
							url: url,
							method: 'get',
							json: true,
							callback: function(data, textStatus, xhr) {
								var html = '';
								var desactivados = 0;
								// data = data.unique(data);
								for (var i = 0; i < data.length; i++) {
									var item = data[i];
									if (item.estatus == '1') {
										var ele = template;
										urls = JSON.parse(item.url);
										ele = ele.replace(/%id%/gi, urls[Tools.extraerUrls().idioma]);
										noms = JSON.parse(item.nombre);
										ele = ele.replace(/%imagenMicrosite%/gi, '//admin.sanremo-on.com/public/uploads/' + Tools.clearStr(noms['it']) + '/logo/' + CryptoJS.MD5(item.logogris).toString());
										ele = ele.replace(/%nombreMicrosite%/gi, noms[idioma]);
										html += ele;
									} else {
										desactivados++;
									}
								};
								console.log('desactivados : ' + desactivados);
								console.log('indice : ' + i);
								if (desactivados == i) {
									$('.row.resultados').html('<h3>'+etiquetas[idioma].sinMicrositesCategoria+'</h3>');
								} else {
									$('.row.resultados').html(html);
								}
								$('[data-field="categoria"]').html(Tools.getCategoriaLabel().replace(/-/gi, ' ').toUpperCase());
							},
							error: function() {
								$('.row.resultados').html('<h3>'+etiquetas[idioma].sinMicrositesCategoria+'</h3>');
								$('[data-field="categoria"]').html(Tools.getCategoriaLabel().replace(/-/gi, ' ').toUpperCase());

							}
						})

						var button2 = '<div class="col-sm-12 text-center bus"><a href="" class="btn btn-success gris2">Mostrar</a></div><div class="clearfix"></div>';


						$('[data-submenu="extras2menos"]').click();
						return false;
					})
				},
				error: function() {}
			});
		});

		$('#extras2 .btn.btn-success.gris').on('click', function(e) {
			e.preventDefault();
			var categoria = variables.categoria;
			var marcas = [];
			$('#extras2 input[type="checkbox"]:checked').each(function(index, el) {
				marcas.push(el.value);
			});
			var url = '//services.sanremo-on.com/service/micrositeMarcaCategoria/cat/' + variables.categoria + '/marca/' + marcas.join('-') + '/format/json'
			if (marcas.length == 0) {
				url = '//services.sanremo-on.com/service/micrositeCategoria/cat/' + variables.categoria + '/format/json';
			}
			Tools.cargarPrincipal({
				url: url,
				method: 'get',
				json: true,
				callback: function(data, textStatus, xhr) {
					var html = '';
					var desactivados = 0;
					// data = data.unique(data);
					for (var i = 0; i < data.length; i++) {
						var item = data[i];
						if (item.estatus == '1') {
							var ele = template;
							urls = JSON.parse(item.url);
							ele = ele.replace(/%id%/gi, urls[Tools.extraerUrls().idioma]);
							noms = JSON.parse(item.nombre);
							ele = ele.replace(/%imagenMicrosite%/gi, '//admin.sanremo-on.com/public/uploads/' + Tools.clearStr(noms['it']) + '/logo/' + CryptoJS.MD5(item.logogris).toString());
							ele = ele.replace(/%nombreMicrosite%/gi, noms[idioma]);
							html += ele;
						} else {
							desactivados++;
						}
					};
					console.log('desactivados : ' + desactivados);
					console.log('indice : ' + i);
					if (desactivados == i) {
						$('.row.resultados').html('<h3>'+etiquetas[idioma].sinMicrositesCategoria+'</h3>');
					} else {
						$('.row.resultados').html(html);
					}
					$('[data-field="categoria"]').html(Tools.getCategoriaLabel().replace(/-/gi, ' ').toUpperCase());
				},
				error: function() {
					$('.row.resultados').html('<h3>'+etiquetas[idioma].sinMicrositesCategoria+'</h3>');
					$('[data-field="categoria"]').html(Tools.getCategoriaLabel().replace(/-/gi, ' ').toUpperCase());

				}
			})



			
			$('[data-submenu="extras2"]').click();
			return false;
		})
	},
	error: function() {}
});





Tools.cargarPrincipal({
	url: '//services.sanremo-on.com/service/micrositeCategoria/cat/' + variables.categoria + '/format/json',
	method: 'get',
	json: true,
	callback: function(data, textStatus, xhr) {
		var html = '';
		var desactivados = 0;
		data.mezclar();
		for (var i = 0; i < data.length; i++) {
			var item = data[i];
			if (item.estatus == '1') {
				var ele = template;
				urls = JSON.parse(item.url);
				ele = ele.replace(/%id%/gi, urls[Tools.extraerUrls().idioma]);
				noms = JSON.parse(item.nombre);
				ele = ele.replace(/%imagenMicrosite%/gi, '//admin.sanremo-on.com/public/uploads/' + Tools.clearStr(noms['it']) + '/logo/' + CryptoJS.MD5(item.logogris).toString());
				ele = ele.replace(/%nombreMicrosite%/gi, noms[idioma]);
				html += ele;
			} else {
				desactivados++;
			}
		};
		console.log('desactivados : ' + desactivados);
		console.log('indice : ' + i);
		if (desactivados == i) {
			$('.row.resultados').html('<h3>'+etiquetas[idioma].sinMicrositesCategoria+'</h3>');
		} else {
			$('.row.resultados').html(html);
		}
		$('[data-field="categoria"]').html(Tools.getCategoriaLabel().replace(/-/gi, ' ').toUpperCase());


		micro = [];
		for (var i = 0; i < data.length; i++) {
			item = data[i];

			micro.push({
				ids: item.idmicrosite,
				name: JSON.parse(item.nombre)[idioma],
				categoria: variables.categoria,
				logo: JSON.parse(item.url)[idioma]
			});
		};
		$('#autocomplete').typeahead({
			source: micro,
			valueKey: 'label',
			updater: function(items) {
				Tools.cargarPrincipal({
					url: '//services.sanremo-on.com/service/microsite/id/' + items.ids + '/format/json',
					method: 'get',
					json: true,
					callback: function(data, textStatus, xhr) {
						var html = '';
						var desactivados = 0;
						var item = data;
						if (item.estatus == '1') {
							var ele = template;
							urls = JSON.parse(item.url);
							ele = ele.replace(/%id%/gi, urls[Tools.extraerUrls().idioma]);
							noms = JSON.parse(item.nombre);
							ele = ele.replace(/%imagenMicrosite%/gi, '//admin.sanremo-on.com/public/uploads/' + Tools.clearStr(noms['it']) + '/logo/' + CryptoJS.MD5(item.logogris).toString());
							ele = ele.replace(/%nombreMicrosite%/gi, noms[idioma]);
							html += ele;
						} else {
							desactivados++;
						}
						// console.log('desactivados : ' + desactivados);
						$('.row.resultados').html(html);
					}
				});
				return items;
			},
			matcher: function(item) {

				// r = JSON.parse(item).label.toLocaleLowerCase().indexOf(this.query.toLocaleLowerCase()) != -1;
				return true;
			}
		});



	},
	error: function() {
		$('.row.resultados').html('<h3>'+etiquetas[idioma].sinMicrositesCategoria+'</h3>');
		$('[data-field="categoria"]').html(Tools.getCategoriaLabel().replace(/-/gi, ' ').toUpperCase());

	}
});
//paloma, funcion para ordenar las marcas
function gon(data){
    for (f=0;f<data.length-1;f++){
        if (data[f].nombre.toLowerCase()>data[f+1].nombre.toLowerCase()){
            temporal=data[f];
            data[f]=data[f+1];
            data[f+1]=temporal;
        }
    }
    return data;
}