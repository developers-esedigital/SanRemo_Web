$('nav#mmovil').mmenu();

$('.selectpicker').selectpicker({
	size: '50%'
});

var template = '<div class="col-sm-3"><div><a href="microsite.html?id=%id%" class="enlace-grid-microsite"><img src="%imagenMicrosite%" class="img-responsive hidden-xs" alt=""></a><span class="visible-xs textoB"><strong>%nombreMicrosite%</strong></span><span class="text-left flechita visible-xs">></span><div class="clearfix"></div></div></div>';
var variables = Tools.textToCat(Tools.extraerCat());
if (variables == 3) {
	$('.mensaje-prenota.mensaje-blu.cinema').show();
}
if (variables == 5) {
	$('.mensaje-prenota.mensaje-blu.acodation').show();
}
Tools.cargarPrincipal({
	url: '//services.sanremo-on.com/service/microsite/url/' + Tools.extraerUrl().url + '/format/json',
	method: 'get',
	json: true,
	asyn: false,
	callback: function(data, textStatus, xhr) {
		window.idioma = Tools.extraerUrl().idioma;
		window.microsite = data;
		$('#bread-cat').html(Tools.extraerCat());
		$('#bread-cat').attr({
			'href': '//sanremo-on.com/' + idioma + '/' + Tools.extraerCat(),
		});

		// stWidget.addEntry({
		// 	"service": "sharethis",
		// 	"element": document.getElementById('button_1'),
		// 	"url": document.location,
		// 	"title": "sharethis",
		// 	"type": "large",
		// 	"text": "ShareThis",
		// 	"image": "http://www.softicons.com/download/internet-icons/social-superheros-icons-by-iconshock/png/256/sharethis_hulk.png",
		// 	"summary": "this is description1"
		// });
		$('#bread-nom').html(JSON.parse(data.nombre)[idioma]);
		$('[data-field="nombre"]').html(JSON.parse(data.nombre)[idioma]);
		$('[data-field="direccion"]').html(data.direccion);
		$('[data-field="telefono"]').html(data.telefono);
		$('[data-field="horario"]').html(JSON.parse(data.apertura)[idioma]);
		$('[data-field="dias"]').html(JSON.parse(data.cierre)[idioma]);
		$('[data-field="url"]').html(data.pagina);
		$('[name="description"]').attr('content', JSON.parse(data.description)[idioma]);
		$('[property="og:image"]').attr('content', Tools.baseAdmin + 'public/uploads/' + Tools.clearStr(JSON.parse(data.nombre)['it']) + '/logo/' + CryptoJS.MD5(data.logo).toString());
		$('[property="og:title"]').attr('content',JSON.parse(data.nombre)[idioma]);

		$('[property="og:description"]').attr('content', JSON.parse(data.description)[idioma]);
		$('[property="og:site_name"]').attr('content', JSON.parse(data.title)[idioma].capitalize());

		if (data.facebook !== '' && data.facebook !== null) {
			$('[data-field="facebook"]').attr('href', data.facebook);
			$('[data-field="facebook"]').css('display', 'block');
			$('[data-field="facebook"]').css('cursor', 'pointer');
		}
		if (data.twitter !== '' && data.twitter !== null) {
			$('[data-field="twitter"]').attr('href', data.twitter);
			$('[data-field="twitter"]').css('display', 'block');
			$('[data-field="twitter"]').css('cursor', 'pointer');
		}
		if (data.google !== '' && data.google !== null) {
			$('[data-field="google"]').attr('href', data.google);
			$('[data-field="google"]').css('display', 'block');
			$('[data-field="google"]').css('cursor', 'pointer');
		}
		if (data.pinterest !== '' && data.pinterest !== null) {
			$('[data-field="pinterest"]').attr('href', data.pinterest);
			$('[data-field="pinterest"]').css('display', 'block');
			$('[data-field="pinterest"]').css('cursor', 'pointer');
		}
		if (data.linkedin !== '' && data.linkedin !== null) {
			$('[data-field="linkedin"]').attr('href', data.linkedin);
			$('[data-field="linkedin"]').css('display', 'block');
			$('[data-field="linkedin"]').css('cursor', 'pointer');
		}
		if (data.instagram !== '' && data.instagram !== null) {
			$('[data-field="instagram"]').attr('href', data.instagram);
			$('[data-field="instagram"]').css('display', 'block');
			$('[data-field="instagram"]').css('cursor', 'pointer');
		}


		$('[data-field="mapaUrl"]').attr({
			'href': '/' + idioma + '/mappa#' + JSON.parse(data.url)[idioma],
			'target': '_black'
		});
		$('[data-field="urllink"]').attr({
			'href': '//' + data.pagina
		});
		$('[data-field="emaillink"]').attr({
			'href': 'mailto:' + data.email
		});

		$('[data-field="prenota"]').attr('href', data.ruta);
		$('[data-field="email"]').html(data.email);
		$('[data-field="logo"]').attr('src', Tools.baseAdmin + 'public/uploads/' + Tools.clearStr(JSON.parse(data.nombre)['it']) + '/logo/' + CryptoJS.MD5(data.logo).toString());
		$('[data-field="descripcion"]').html(JSON.parse(data.descripcion)[idioma]);
		$('[data-field="logoRes"]').attr('src', Tools.baseAdmin + 'public/uploads/' + Tools.clearStr(JSON.parse(data.nombre)['it']) + '/logo/' + CryptoJS.MD5(data.logo).toString());
		$('[data-field="logo"]').css({
			width: '180px',
			height: '122px'
		});
		$('title').html(JSON.parse(data.title)[idioma].capitalize());

		var templateGaleria = '<div class="item" style="width:100%;max-height: 340px; overflow:hidden;"><img src="%src%" class="img-responsive" width="100%" height="100%"></div>';
		var templateGaleria1 = '<div class="item active" style="width:100%;max-height: 340px; overflow:hidden;"><img src="%src%" class="img-responsive" width="100%" height="100%"></div>';
		var templateGaleriaRes = '<div style="width:100%;max-height: 340px; overflow:hidden;" class="item next left"><img height="100%" width="100%" class="img-responsive" src="%src%"></div>';
		var templateGaleriaRes1 = '<div style="width:100%;max-height: 340px; overflow:hidden;" class="item next left"><img height="100%" width="100%" class="img-responsive" src="%src%"></div>';
		var html = '';
		var html2 = '';
		var gal = data.logoprincipal.split(',');
		var gal2 = data.imagenslider.split(',');
		for (var i = 0; i < gal.length; i++) {
			var img = gal[i];
			var img2 = gal2[i];
			if (i == 0) {
				html += templateGaleria1.replace(/%src%/gi, Tools.baseAdmin + 'public/uploads/' + Tools.clearStr(JSON.parse(data.nombre)['it']) + '/main/' + img);
				html2 += templateGaleria1.replace(/%src%/gi, Tools.baseAdmin + 'public/uploads/' + Tools.clearStr(JSON.parse(data.nombre)['it']) + '/galeria/' + img2);
			} else {
				html += templateGaleriaRes.replace(/%src%/gi, Tools.baseAdmin + 'public/uploads/' + Tools.clearStr(JSON.parse(data.nombre)['it']) + '/main/' + img);
				html2 += templateGaleriaRes1.replace(/%src%/gi, Tools.baseAdmin + 'public/uploads/' + Tools.clearStr(JSON.parse(data.nombre)['it']) + '/galeria/' + img2);
			}
		};
		$('#myCarousel2 .carousel-inner').html(html).promise().done(function() {
			$('#myCarousel2').carousel({
				interval: 2000,
			});
			$('#myCarousel3').carousel('cycle');

		});
		$('#myCarousel3 .carousel-inner').html(html2).promise().done(function() {
			$('#myCarousel3').carousel({
				interval: 2000,
			});
			$('#myCarousel3').carousel('cycle');
		});
		var templateOferta = '<div class="col-sm-6 offer img-ofert-iz"><div><a href="%src%" class="enlace-oferta"><div class="col-sm-7 col-xs-7 imagen-ofertas visible-xs"><img src="%img-res%" alt="" class="img-responsive"></div><div class="col-sm-7 col-xs-7 imagen-ofertas hidden-xs"><img class="img-responsive" alt="" src="%img%"></div><div class="col-sm-5 col-xs-5"><p class="f1"><i class="fa fa-tag"></i> Offerte</p><p class="f2">%nombre%</p><p class="f3">%microsite%</p><p class="descuento f3"><span class="percentual">%descuento%</span><span class="sconto hidden-xs %tt% hidden-ms">Sconto</span></p></div><div class="clearfix"></div></div></div>';
		var templateNoticia = '<div class="col-sm-4"><div><a class="enlace-noticia" href="%url%"><img alt="" class="img-responsive" src="%img%"><span class=" textoB">%nombre%</span><br><span class="gris fecha">%fecha%</span><span class="text-left flechita "><img alt="" src="/images/dd.png"></span><div class="clearfix"></div></a></div></div>';
		Tools.cargarPrincipal({
			url: '//services.sanremo-on.com/service/ofertas/format/json',
			method: 'get',
			json: true,
			callback: function(rr) {
				var elemento = '';
				for (var i = 0; i < rr.length; i++) {
					var item = rr[i];
					if (item.idmicrosite.idmicrosite == data.idmicrosite) {
						elemento = templateOferta.replace('%img%', '//admin.sanremo-on.com/public/uploads/ofertas/' + item.imagengrid);
						elemento = elemento.replace('%img-res%', '//admin.sanremo-on.com/public/uploads/ofertas/' + item.gridmovil);

						elemento = elemento.replace('%src%', '//sanremo-on.com/' + idioma + '/news/offerte/' + Tools.clearStr(JSON.parse(data.nombre)[idioma]).toLowerCase() + '/' + JSON.parse(item.url)[idioma] + '.html');
						elemento = elemento.replace('%nombre%', JSON.parse(item.nombre)[idioma]);
						elemento = elemento.replace('%microsite%', JSON.parse(data.nombre)[idioma]);
						elemento = elemento.replace('%descuento%', item.porcentaje !== '' ? item.porcentaje + '%' : '');
						elemento = elemento.replace('%tt%', item.porcentaje !== '' ? '' : 'hidden');

						$('.row.offerandnew.ofertas').append(elemento);
					}
				};
				if (elemento == '') {
					$('.row.linea.orange.oferta').css('display', 'none');
				}

			},
			error: function() {
				$('.row.linea.orange.oferta').css('display', 'none');
			}
		});
		Tools.cargarPrincipal({
			url: '//services.sanremo-on.com/service/noticias/format/json',
			method: 'get',
			json: true,
			callback: function(rr) {
				var elemento = '';
				for (var i = 0; i < rr.length; i++) {
					var item = rr[i];
					fecha = item.fechainicio.trim();
					f1 = fecha.trim().split('/');
					// f2 = fecha[1].trim().split('/');
					newfecha = f1[1] + '/' + f1[0] + '/' + f1[2];
					if (item.microsite == data.idmicrosite) {
						elemento = templateNoticia.replace('%img%', '//admin.sanremo-on.com/public/uploads/noticia/' + item.imagengrid);
						elemento = elemento.replace('%nombre%', JSON.parse(item.nombre)[idioma]);
						elemento = elemento.replace('%url%', '//sanremo-on.com/' + idioma + '/news/attualita/' + Tools.clearStr(JSON.parse(data.nombre)[idioma]).toLowerCase() + '/' + JSON.parse(item.url)[idioma] + '.html');
						elemento = elemento.replace('%microsite%', JSON.parse(data.nombre)[idioma]);
						elemento = elemento.replace('%fecha%', newfecha);
						$('.row.offerandnew.noticias').append(elemento);
					}
				};
				if (elemento == '') {
					$('.row.linea.orange.noticias').css('display', 'none');
				}
			},
			error: function() {
				$('.row.linea.orange.noticias').css('display', 'none');
			}
		});
	},
	error: function() {}
});
// row offerandnew