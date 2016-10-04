$('nav#mmovil').mmenu();

$('.selectpicker').selectpicker({
	size: '50%'
});

$('.search.form-control').typeahead({        
    	source: ['alpha','allpha2','alpha3','bravo','charlie','delta','epsilon','gamma','zulu']
});  

$('.Mextras').on('click', function(evt) {
	evt.preventDefault();
	if ($(this).hasClass('mmenuSecHovered')) {
		$('#' + $(this).data('submenu')).fadeOut('normal');
		$(this).toggleClass('mmenuSecHovered');
	}else{
		$('#' + $(this).data('submenu')).fadeIn('normal');
		$(this).toggleClass('mmenuSecHovered');
	}
	return false;
});
$('.otro').on('click',function(){
	$('.mmenuSecHovered').toggleClass('mmenuSecHovered');
	$('#sub1').fadeOut('normal');
});

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
/*$('.slider-banner').fractionSlider({
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
});*/
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

var helper = {
	getTextTipo: function() {
		return 'NEGOZI';
	},
	getClassTipo: function(){
		if(control == 0)
			return 'orange';
		return 'red';
	},
	getImgTipo: function() {
		if(control == 0)
			return 'images/Logo-Negozi.png';
		return 'images/Negozi-Rojo.png';
	}
};
var tools = {
	isRetina : function(){
		if(window.devicePixelRatio > 1)
			return true;
		return false;
	}
}
var logoMarker = {
	retina: ['images/Posicion-naranja@2.png','images/Posicion@2.png'],
	normal: ['images/Posicion-naranja.png','images/Posicion.png'],
	getLogo: function(index){
		if(tools.isRetina())
			return this.retina[index];
		return this.normal[index];
	}
};


var places = [{
	latlon: new google.maps.LatLng(43.818448, 7.770756),
	title: 'Test 0',
	icon: logoMarker.getLogo(control),
	num: 1,
	contenido: {
		imagen: 'images/Logo-local.png',
		tipo: helper.getTextTipo(1),
		tipoImage: helper.getImgTipo(1),
		descripcion: 'Lorem ipsum dolor sit.',
		direccion:'Lorem ipsum dolor sit amet, consectetur.',
		telefono:'+39 0165465465',
		correo: 'example@example.com'
	}
}, {
	latlon: new google.maps.LatLng(43.815444, 7.772087),
	title: 'Test 1',
	icon: logoMarker.getLogo(control),
	num: 2,
	contenido: {
		imagen: 'images/Logo-local.png',
		tipo: helper.getTextTipo(1),
		tipoImage: helper.getImgTipo(1),
		descripcion: 'Lorem ipsum dolor sit.',
		direccion:'Lorem ipsum dolor sit amet, consectetur.',
		telefono:'+39 0165465465',
		correo: 'example@example.com'
	}
}, {
	latlon: new google.maps.LatLng(43.812874, 7.776057),
	title: 'Test 2',
	icon: logoMarker.getLogo(control),
	num: 3,
	contenido: {
		imagen: 'images/Logo-local.png',
		tipo: helper.getTextTipo(1),
		tipoImage: helper.getImgTipo(1),
		descripcion: 'Lorem ipsum dolor sit.',
		direccion:'Lorem ipsum dolor sit amet, consectetur.',
		telefono:'+39 0165465465',
		correo: 'example@example.com'
	}
}, {
	latlon: new google.maps.LatLng(43.815243, 7.780305),
	title: 'Test 3',
	icon: logoMarker.getLogo(control),
	num: 4,
	contenido: {
		imagen: 'images/Logo-local.png',
		tipo: helper.getTextTipo(1),
		tipoImage: helper.getImgTipo(1),
		descripcion: 'Lorem ipsum dolor sit.',
		direccion:'Lorem ipsum dolor sit amet, consectetur.',
		telefono:'+39 0165465465',
		correo: 'example@example.com'
	}
}];
var templatePlace = '<div class="place"><div class="markerr"><img src="%logo%" alt=""><span class="numero">%number%</span></div><div class="titulo"><strong>%title%</strong></div><div class="tipo"><img src="%logoTipo%" alt=""><span class="logo %className%">%nombreTipo%</span></div><div class="contenido"><p class="direccion">%direccion%</p><p class="telefono"><img src="/images/Telefono.png" alt=""> %telefono%</p><p class="correo"><img src="/images/Arroba.png" alt=""> %correo%</p></div></div>';
function initialize() {

	var contenido = '<div class="marker"><img src="%logo%" alt="%title%" /><div><span class="titulo"><strong>%title%</strong></span><div class="tipo %className%"><img src="%logoTipo%" alt="" class="tipoI" /> %nombreTipo%</div><p>%contenido%</p> </div><a href="#" class="btn orange">Guardar</a></div>';
	var myLatlng = new google.maps.LatLng(43.818448, 7.770756);
	var mapOptions = {
		zoom: 18,
		center: myLatlng
	}
	var map = new google.maps.Map(document.querySelector('.mapaG'), mapOptions);
	var infowindow = new google.maps.InfoWindow();
	var createMarker = function(params, mapa) {
		var icono = new google.maps.MarkerImage(params.icon, null, null, null, new google.maps.Size(32,41));
		var marker = new google.maps.Marker({
			position: params.latlon,
			map: mapa,
			title: params.title,
			icon: icono
		});

		var marker = new MarkerWithLabel({
	       position: params.latlon,
	       map: map,
	       icon:icono,
	       draggable: false,
	       raiseOnDrag: false,
	       labelContent: params.num,
	       labelAnchor: new google.maps.Point(3, 30),
	       labelClass: "labels", // the CSS class for the label
	       labelInBackground: false
	     });
		/*var label = new Label({
			map: map,
			value: params.num
		});*/
		/*label.bindTo('position', marker, 'position');
		label.bindTo('text', marker, 'position');*/
		console.log(params.contenido.titulo);//.contenido.imagen
		google.maps.event.addListener(marker, 'click', function() {
			var nContenido = contenido.replace('%logo%', params.contenido.imagen);
			nContenido = nContenido.replace(/%title%/gi, params.title);
			nContenido = nContenido.replace('%logoTipo%', params.contenido.tipoImage);
			nContenido = nContenido.replace('%nombreTipo%', params.contenido.tipo);
			nContenido = nContenido.replace('%contenido%', params.contenido.descripcion);
			nContenido = nContenido.replace('%className%', helper.getClassTipo());
			infowindow.setContent(nContenido);
			infowindow.close();
			infowindow.open(map, marker);
		});
		markers.push(marker);
	}

	var templatePlace = '<div class="place"><div class="markerr"><img src="%logo%" alt=""><span class="numero">%number%</span></div><div class="titulo"><strong>%title%</strong></div><div class="tipo"><img src="%logoTipo%" alt=""><span class="logo %className%">%nombreTipo%</span></div><div class="contenido"><p class="direccion">%direccion%</p><p class="telefono"><i class="fa fa-phone"></i> %telefono%</p><p class="correo"><img src="/images/Arroba.png" alt=""> %correo%</p></div></div>';
	var createLista = function(elemento,lugar){
		var contenido = templatePlace.replace('%logo%', logoMarker.getLogo(control));
		contenido = contenido.replace('%number%', elemento.num);
		contenido = contenido.replace(/%title%/gi, elemento.title);
		contenido = contenido.replace('%telefono%', elemento.contenido.telefono);
		contenido = contenido.replace('%correo%', elemento.contenido.correo);
		contenido = contenido.replace('%logoTipo%', elemento.contenido.tipoImage);
		contenido = contenido.replace('%nombreTipo%', elemento.contenido.tipo);
		contenido = contenido.replace('%direccion%', elemento.contenido.direccion);
		contenido = contenido.replace('%className%', helper.getClassTipo());
		document.querySelector(lugar).innerHTML = document.querySelector(lugar).innerHTML + contenido;
	}
	var markers = [];
	for (var i = 0; i < places.length; i++) {
		createMarker(places[i], map);
		createLista(places[i],'.lugares > .resMapa');
	};

}
google.maps.event.addDomListener(window, 'load', initialize);



function Label(opt_options) {
	this.setValues(opt_options);
	var span = this.span_ = document.createElement('span');
	span.style.cssText = 'position: relative; left: -40%; top: -8px; ' +
		'white-space: nowrap;' +
		'color:#ffffff;font-weight:bold;z-index:999999 !important;top:-35px;font-size:17px;';
	var div = this.div_ = document.createElement('div');
	div.appendChild(span);
	div.style.cssText = 'position: absolute; display: block';
};
Label.prototype = new google.maps.OverlayView;
Label.prototype.onAdd = function() {
	var pane = this.getPanes().overlayLayer;
	console.log(pane);
	pane.style = {
		'z-index': '999998;'
	};
	pane.appendChild(this.div_);
	var me = this;
	this.listeners_ = [
		google.maps.event.addListener(this, 'position_changed',
			function() {
				me.draw();
			}),
		google.maps.event.addListener(this, 'text_changed',
			function() {
				me.draw();
			})
	];
};

Label.prototype.onRemove = function() {
	this.div_.parentNode.removeChild(this.div_);
	for (var i = 0, I = this.listeners_.length; i < I; ++i) {
		google.maps.event.removeListener(this.listeners_[i]);
	}
};
Label.prototype.draw = function() {
	var projection = this.getProjection();
	var position = projection.fromLatLngToDivPixel(this.get('position'));
	var div = this.div_;
	div.style.left = position.x + 'px';
	div.style.top = position.y + 'px';
	div.style.display = 'block';
	this.span_.innerHTML = this.value;
};