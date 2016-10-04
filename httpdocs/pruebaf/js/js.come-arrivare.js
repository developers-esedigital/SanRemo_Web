$('nav#mmovil').mmenu();

$('.selectpicker').selectpicker({
	size: '50%'
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

function initialize() {
	var myLatlng = new google.maps.LatLng(43.818448, 7.770756);
	var mapOptions = {
		zoom: 15,
		center: myLatlng
	}
	var map = new google.maps.Map(document.querySelector('.mapaSanRemo'), mapOptions);
	// var infowindow = new google.maps.InfoWindow();
	var marker = new google.maps.Marker({
		position: myLatlng,
		map: map,
		title: 'Sanremo',
		icon: '/images/Logo-posicion.png'
	});
	var label = new Label({
			map: map
	});
	google.maps.event.addListener(marker, 'click', function() {
	    window.open('https://www.google.com/maps?ll=43.818448,7.770756&z=15&t=m&hl=es','_blank');
  	});
	
	label.bindTo('position', marker, 'position');
	label.bindTo('text', marker, 'position');

}
google.maps.event.addDomListener(window, 'load', initialize);

$("#searchss").on('click',function(){
	window.open('https://www.google.com/maps?saddr='+$('#search').val()+'&f=d&source=s_d&daddr=C/Corso+Giacomo+Matteotti,+15,+18038+Sanremo+IM,+Italia')
})



function Label(opt_options) {
	this.setValues(opt_options);
	var span = this.span_ = document.createElement('span');
	span.style.cssText = 'position: relative; left: -50%; top: -8px; ' +
		'white-space: nowrap;' +
		'color:#ffffff;font-weight:bold;z-index:9999 !important;top:-70px;font-size:17px;';
	var div = this.div_ = document.createElement('div');
	div.appendChild(span);
	div.style.cssText = 'position: absolute; display: none';
};
Label.prototype = new google.maps.OverlayView;
Label.prototype.onAdd = function() {
	var pane = this.getPanes().overlayLayer;
	pane.style = {
		'z-index': '9999px;'
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
	this.span_.innerHTML = '<img src="/images/Logo-sanremo-on-mapa.png" alt="" />';
};